<?php

namespace Logan\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends Controller
{
	public function registerAction(Request $request)
	{
		//$user = new User();
		//$userType = new UserType();
		//defined in services.yml
		$user = $this->get('user');
		$userType = $this->get('userType');

		$form = $this->createForm($userType, $user);

		$form->handleRequest($request);

		$error = '';

		if ($form->isValid()) {

			if($this->usernameAvailable($user->getUsername())) {

				//passwort auf hash wert setzen
				$factory = $this->get('security.encoder_factory');
				$encoder = $factory->getEncoder($user);
				$password = $encoder->encodePassword($user->getPlainPassword(), $user->getSalt());
				$user->setPassword($password);

				$em = $this->getDoctrine()->getManager();
				$em->persist($user);
				$em->flush();

				return $this->redirect($this->generateUrl('login'));
			}else{

				$error = 'Username is already in use. Please choose an other username!';
			}
		}

		return $this->render(
			'LoganUserBundle:Registration:register.html.twig',
			array('form' => $form->createView(), 'error' => $error)
		);
	}

	private function usernameAvailable($username) {

		$repository = $this->get('userRepository');

		$query = $repository->createQueryBuilder('u')
			->where('u.username = :username')
			->setParameter('username', $username)
			->getQuery();

		$user = $query->getOneOrNullResult();

		return is_null(($user));
	}
}
