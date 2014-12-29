<?php

namespace Logan\MessageBundle\Controller;

use Logan\MessageBundle\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MessageController extends Controller
{
	public function messagesAction()
	{
		$messages = $this->getUser()->getMessagesReceived();

		return $this->render('LoganMessageBundle:Message:messages.html.twig', array('messages' => $messages));
	}

	public function messagesSentAction()
	{
		$messages = $this->getUser()->getMessagesSent();

		return $this->render('LoganMessageBundle:Message:messages.html.twig', array('messages' => $messages));
	}

	public function sendMessageAction(Request $request, $userId) {

		$repository = $this->get('userRepository');
		$userTo = $repository->find($userId);
		$user = $this->getUser();

		if(is_null($userTo)) {

			return $this->render('LoganMessageBundle:Message:error.html.twig');
		}
		$username = $userTo->getUsername();

		$message = $this->get('message');
		$messageType = $this->get('messageType');

		$form = $this->createForm($messageType, $message);

		$form->handleRequest($request);
		if($form->isValid()) {

			$message->setDateSent(new \DateTime());
			$message->setUserTo($userTo);
			$message->setUserFrom($user);

			$em = $this->getDoctrine()->getManager();
			$em->persist($message);
			$em->flush();

			return $this->redirect($this->generateUrl('messages'));
		}

		return $this->render('LoganMessageBundle:Message:sendMessage.html.twig',
			array(
				'username' => $username,
				'form' => $form->createView()
			));
	}

    public function showMessageAction($messageId)
    {
		$repository = $this->get('messageRepository');
		$message = $repository->find($messageId);

		//message vorhanden und recht vorhanden message zu sehen!?
		$user = $this->getUser();
		if(is_null($message)or
			($message->getUserFrom() != $user and $message->getUserTo() != $user)) {

			//wenn nicht
			return $this->render('LoganMessageBundle:Message:error.html.twig');
		}

		//gelesen setzen wenn noch nicht vorhanden und wenn es sich um empfangene nachricht handelt
		if(is_null($message->getDateReceived()) and $message->getUserTo()  == $user) {

			$message->setDateReceived(new \DateTime());

			$em = $this->getDoctrine()->getManager();
			$em->persist($message);
			$em->flush();
		}

        return $this->render('LoganMessageBundle:Message:showMessage.html.twig', array('message' => $message));
    }
}
