<?php

namespace Logan\ClimbingPartnerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{

	public function searchProfilesAction(Request $request) {

		$searchdata = $this->get('searchdata');
		$searchType = $this->get('searchdataType');

		$form = $this->createForm($searchType, $searchdata);

		$results = array();
		$form->handleRequest($request);
		if ($form->isValid()) {

			//user mit suchkriterien suchen
			$repository = $this->getDoctrine()->getRepository('LoganUserBundle:User');
			$query = $repository->createQueryBuilder('u')->innerJoin('u.userdata', 'd');

			$searchFields = array('ort' => 'getOrt',
				'plz' => 'getPLZ',
				'geschlecht' => 'getGeschlecht',
				'gradBis' => 'getGradBis',
				'vorstieg' => 'getVorstieg',
				'seilVorhanden' => 'getSeilVorhanden'
			);

			foreach($searchFields as $key => $field) {

				$value = $searchdata->$field();
				if(!is_null($value)) {

					$query->andWhere("d.$key LIKE :$key");
					$query->setParameter($key, '%'.$value.'%');
				}
			}

			$query->addGroupBy('d.ort');
			$results = $query->getQuery()->getResult();
		}

		return $this->render('LoganClimbingPartnerBundle:Profile:searchProfiles.html.twig',
			array(	'form' => $form->createView(),
				'results' => $results)
		);
	}
}
