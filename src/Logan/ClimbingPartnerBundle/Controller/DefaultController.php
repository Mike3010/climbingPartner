<?php

namespace Logan\ClimbingPartnerBundle\Controller;

use Logan\ClimbingPartnerBundle\Entity\Userdata;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

		$user = $this->getUser();
		$userdata = $user->getUserdata();

        return $this->render('LoganClimbingPartnerBundle:Default:index.html.twig',
			array(	'user' => $user,
					'userdata' => $userdata));
    }
}
