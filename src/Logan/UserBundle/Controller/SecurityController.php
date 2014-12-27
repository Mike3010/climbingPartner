<?php

namespace Logan\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;

class SecurityController extends Controller
{
	public function loginAction(Request $request)
	{
		$session = $request->getSession();

		// last username entered by the user
		$lastUsername = $this->getLastUsername($session);

		//error, if there is one
		$error = $this->getError($session, $request);

		return $this->render(
			'LoganUserBundle:Security:login.html.twig',
			array(
				'last_username' => $lastUsername,
				'error'         => $error,
			)
		);
	}

	public function loginEmbeddedAction(Request $request)
	{
		$session = $request->getSession();

		// last username entered by the user
		$lastUsername = $this->getLastUsername($session);

		//error, if there is one
		$error = $this->getError($session, $request);

		return $this->render(
			'LoganUserBundle:Security:login_embedded.html.twig',
			array(
				'last_username' => $lastUsername,
				'error'         => $error,
			)
		);
	}

	private function getLastUsername($session) {

		$lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);

		return $lastUsername;
	}

	private function getError($session, $request) {

		// get the login error if there is one
		if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
			$error = $request->attributes->get(
				SecurityContextInterface::AUTHENTICATION_ERROR
			);
		} elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
			$error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
			$session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
		} else {
			$error = '';
		}

		return $error;
	}
}
