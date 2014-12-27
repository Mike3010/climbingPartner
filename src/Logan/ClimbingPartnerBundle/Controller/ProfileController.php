<?php

namespace Logan\ClimbingPartnerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{

	public function editOwnProfileAction(Request $request) {

		$user = $this->getUser();
		$userdata = $user->getUserdata();

		$userdataType = $this->get('userdataType');

		$form = $this->createForm($userdataType, $userdata);

		$form->handleRequest($request);
		if ($form->isValid()) {

			if($form->get('Abbrechen')->isClicked()) {
				return $this->redirect('profile');
			}

			$em = $this->getDoctrine()->getManager();
			$em->persist($userdata);
			$em->flush();

			return $this->redirect($this->generateUrl('profile'));
		}

		return $this->render(
			'LoganClimbingPartnerBundle:Profile:editOwnProfile.html.twig',
			array(
				'user' => $user,
				'form' => $form->createView()
			)
		);
	}

	public function ownProfileAction(Request $request) {

		$user = $this->getUser();

		return $this->render(
			'LoganClimbingPartnerBundle:Profile:ownProfile.html.twig',
			array(	'user' => $user,
					'userdata' => $user->getUserdata())
		);
	}

	public function showProfileAction(Request $request, $userId) {

		$user = $this->getDoctrine()
			->getRepository('LoganUserBundle:User')
			->find($userId);

		if(is_null($user)) {

			return $this->render('LoganClimbingPartnerBundle:Profile:notFound.html.twig');
		}

		return $this->render(
			'LoganClimbingPartnerBundle:Profile:showProfile.html.twig',
			array(	'user' => $user,
					'userdata' => $user->getUserdata())
		);
	}
}
