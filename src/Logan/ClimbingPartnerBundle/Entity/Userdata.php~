<?php

namespace Logan\ClimbingPartnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userdata
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Userdata
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

	/**
	 * @ORM\OneToOne(targetEntity="Logan\UserBundle\Entity\User", inversedBy="userdata")
	 */
	private $user;

	/**
	 * @ORM\Column(name="ort", type="string", length=255, nullable=true);
	 */
	private $ort;

	/**
	 * @ORM\Column(name="plz", type="integer", nullable=true);
	 */
	private $plz;

	/**
	 * @ORM\Column(name="geschlecht", type="string", length=1, nullable=true);
	 */
	private $geschlecht;

	/**
	 * @ORM\Column(name="email", type="string", length=255, nullable=true);
	 */
	private $email;

	/**
	 * @ORM\Column(name="text", type="text", nullable=true);
	 */
	private $text;

	/**
	 * @ORM\Column(name="tag1", type="integer", nullable=true);
	 */
	private $tag1;

	/**
	 * @ORM\Column(name="tag2", type="integer", nullable=true);
	 */
	private $tag2;

	/**
	 * @ORM\Column(name="tag3", type="integer", nullable=true);
	 */
	private $tag3;

	/**
	 * @ORM\Column(name="tag4", type="integer", nullable=true);
	 */
	private $tag4;

	/**
	 * @ORM\Column(name="tag5", type="integer", nullable=true);
	 */
	private $tag5;

	/**
	 * @ORM\Column(name="tag6", type="integer", nullable=true);
	 */
	private $tag6;

	/**
	 * @ORM\Column(name="tag7", type="integer", nullable=true);
	 */
	private $tag7;

	/**
	 * @ORM\Column(name="gradBis", type="string", length=5, nullable=true);
	 */
	private $gradBis;

	/**
	 * @ORM\Column(name="vorstieg", type="string", length=1, nullable=true);
	 */
	private $vorstieg;

	/**
	 * @ORM\Column(name="seilVorhanden", type="string", length=1, nullable=true);
	 */
	private $seilVorhanden;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ort
     *
     * @param string $ort
     * @return Userdata
     */
    public function setOrt($ort)
    {
        $this->ort = $ort;

        return $this;
    }

    /**
     * Get ort
     *
     * @return string 
     */
    public function getOrt()
    {
        return $this->ort;
    }

    /**
     * Set plz
     *
     * @param integer $plz
     * @return Userdata
     */
    public function setPlz($plz)
    {
        $this->plz = $plz;

        return $this;
    }

    /**
     * Get plz
     *
     * @return integer 
     */
    public function getPlz()
    {
        return $this->plz;
    }

    /**
     * Set geschlecht
     *
     * @param string $geschlecht
     * @return Userdata
     */
    public function setGeschlecht($geschlecht)
    {
        $this->geschlecht = $geschlecht;

        return $this;
    }

    /**
     * Get geschlecht
     *
     * @return string 
     */
    public function getGeschlecht()
    {
        return $this->geschlecht;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Userdata
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Userdata
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set tag1
     *
     * @param integer $tag1
     * @return Userdata
     */
    public function setTag1($tag1)
    {
        $this->tag1 = $tag1;

        return $this;
    }

    /**
     * Get tag1
     *
     * @return integer 
     */
    public function getTag1()
    {
        return $this->tag1;
    }

    /**
     * Set tag2
     *
     * @param integer $tag2
     * @return Userdata
     */
    public function setTag2($tag2)
    {
        $this->tag2 = $tag2;

        return $this;
    }

    /**
     * Get tag2
     *
     * @return integer 
     */
    public function getTag2()
    {
        return $this->tag2;
    }

    /**
     * Set tag3
     *
     * @param integer $tag3
     * @return Userdata
     */
    public function setTag3($tag3)
    {
        $this->tag3 = $tag3;

        return $this;
    }

    /**
     * Get tag3
     *
     * @return integer 
     */
    public function getTag3()
    {
        return $this->tag3;
    }

    /**
     * Set tag4
     *
     * @param integer $tag4
     * @return Userdata
     */
    public function setTag4($tag4)
    {
        $this->tag4 = $tag4;

        return $this;
    }

    /**
     * Get tag4
     *
     * @return integer 
     */
    public function getTag4()
    {
        return $this->tag4;
    }

    /**
     * Set tag5
     *
     * @param integer $tag5
     * @return Userdata
     */
    public function setTag5($tag5)
    {
        $this->tag5 = $tag5;

        return $this;
    }

    /**
     * Get tag5
     *
     * @return integer 
     */
    public function getTag5()
    {
        return $this->tag5;
    }

    /**
     * Set tag6
     *
     * @param integer $tag6
     * @return Userdata
     */
    public function setTag6($tag6)
    {
        $this->tag6 = $tag6;

        return $this;
    }

    /**
     * Get tag6
     *
     * @return integer 
     */
    public function getTag6()
    {
        return $this->tag6;
    }

    /**
     * Set tag7
     *
     * @param integer $tag7
     * @return Userdata
     */
    public function setTag7($tag7)
    {
        $this->tag7 = $tag7;

        return $this;
    }

    /**
     * Get tag7
     *
     * @return integer 
     */
    public function getTag7()
    {
        return $this->tag7;
    }

    /**
     * Set gradBis
     *
     * @param string $gradBis
     * @return Userdata
     */
    public function setGradBis($gradBis)
    {
        $this->gradBis = $gradBis;

        return $this;
    }

    /**
     * Get gradBis
     *
     * @return string 
     */
    public function getGradBis()
    {
        return $this->gradBis;
    }

    /**
     * Set vorstieg
     *
     * @param string $vorstieg
     * @return Userdata
     */
    public function setVorstieg($vorstieg)
    {
        $this->vorstieg = $vorstieg;

        return $this;
    }

    /**
     * Get vorstieg
     *
     * @return string 
     */
    public function getVorstieg()
    {
        return $this->vorstieg;
    }

    /**
     * Set seilVorhanden
     *
     * @param string $seilVorhanden
     * @return Userdata
     */
    public function setSeilVorhanden($seilVorhanden)
    {
        $this->seilVorhanden = $seilVorhanden;

        return $this;
    }

    /**
     * Get seilVorhanden
     *
     * @return string 
     */
    public function getSeilVorhanden()
    {
        return $this->seilVorhanden;
    }

    /**
     * Set user
     *
     * @param \Logan\UserBundle\Entity\User $user
     * @return Userdata
     */
    public function setUser(\Logan\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Logan\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }


	public function getFormattedUserInfo() {

		return $this->getEmail().' '.$this->getGeschlecht().' '.$this->getGradBis();
	}
}
