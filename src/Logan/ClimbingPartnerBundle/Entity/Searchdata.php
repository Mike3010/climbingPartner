<?php

namespace Logan\ClimbingPartnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userdata
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Searchdata
{

	private $plz;

	private $ort;

	private $geschlecht;

	private $gradBis;

	private $seilVorhanden;

	private $vorstieg;

	/**
	 * @return mixed
	 */
	public function getGeschlecht()
	{
		return $this->geschlecht;
	}

	/**
	 * @param mixed $geschlecht
	 */
	public function setGeschlecht($geschlecht)
	{
		$this->geschlecht = $geschlecht;
	}

	/**
	 * @return mixed
	 */
	public function getGradBis()
	{
		return $this->gradBis;
	}

	/**
	 * @param mixed $gradBis
	 */
	public function setGradBis($gradBis)
	{
		$this->gradBis = $gradBis;
	}

	/**
	 * @return mixed
	 */
	public function getOrt()
	{
		return $this->ort;
	}

	/**
	 * @param mixed $ort
	 */
	public function setOrt($ort)
	{
		$this->ort = $ort;
	}

	/**
	 * @return mixed
	 */
	public function getPlz()
	{
		return $this->plz;
	}

	/**
	 * @param mixed $plz
	 */
	public function setPlz($plz)
	{
		$this->plz = $plz;
	}

	/**
	 * @return mixed
	 */
	public function getSeilVorhanden()
	{
		return $this->seilVorhanden;
	}

	/**
	 * @param mixed $seilVorhanden
	 */
	public function setSeilVorhanden($seilVorhanden)
	{
		$this->seilVorhanden = $seilVorhanden;
	}

	/**
	 * @return mixed
	 */
	public function getVorstieg()
	{
		return $this->vorstieg;
	}

	/**
	 * @param mixed $vorstieg
	 */
	public function setVorstieg($vorstieg)
	{
		$this->vorstieg = $vorstieg;
	}
}
