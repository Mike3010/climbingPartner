<?php

namespace Logan\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Logan\MessageBundle\Model\MessageInterface;

/**
 * Message
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Message implements MessageInterface
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
	 * @ORM\ManyToOne(targetEntity="Logan\UserBundle\Entity\User", inversedBy="messagesSent")
	 * @ORM\JoinColumn(name="user_from_id", referencedColumnName="id")
	 */
	private $userFrom;

	/**
	 * @ORM\Column(name="user_from_id", type="integer")
	 */
	private $userFromId;
	/**
	 * @ORM\ManyToOne(targetEntity="Logan\UserBundle\Entity\User", inversedBy="messagesReceived")
	 * @ORM\JoinColumn(name="user_to_id", referencedColumnName="id")
	 */
	private $userTo;
	/**
	 * @ORM\Column(name="user_to_id", type="integer")
	 */
	private $userToId;
	/**
	 * @ORM\Column(name="subject", type="string", length=255)
	 */
	private $subject;
	/**
	 * @ORM\Column(name="text", type="text")
	 */
	private $text;
	/**
	 * @ORM\Column(name="dateSent", type="datetime")
	 */
	private $dateSent;
	/**
	 * @ORM\Column(name="dateReceived", type="datetime")
	 */
	private $dateReceived;

	/**
	 * @return mixed
	 */
	public function getUserFromId()
	{
		return $this->userFromId;
	}

	/**
	 * @param mixed $userFromId
	 */
	public function setUserFromId($userFromId)
	{
		$this->userFromId = $userFromId;
	}

	/**
	 * @return mixed
	 */
	public function getUserToId()
	{
		return $this->userToId;
	}

	/**
	 * @param mixed $userToId
	 */
	public function setUserToId($userToId)
	{
		$this->userToId = $userToId;
	}

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
	 * Get userFrom
	 *
	 * @return \Logan\UserBundle\Entity\User
	 */
	public function getUserFrom()
	{
		return $this->userFrom;
	}

	/**
	 * Set userFrom
	 *
	 * @param \Logan\UserBundle\Entity\User $userFrom
	 * @return Message
	 */
	public function setUserFrom(\Logan\UserBundle\Entity\User $userFrom = null)
	{
		$this->userFrom = $userFrom;

		return $this;
	}

	/**
	 * Get userTo
	 *
	 * @return \Logan\UserBundle\Entity\User
	 */
	public function getUserTo()
	{
		return $this->userTo;
	}

	/**
	 * Set userTo
	 *
	 * @param \Logan\UserBundle\Entity\User $userTo
	 * @return Message
	 */
	public function setUserTo(\Logan\UserBundle\Entity\User $userTo = null)
	{
		$this->userTo = $userTo;

		return $this;
	}

	/**
	 * Get subject
	 *
	 * @return string
	 */
	public function getSubject()
	{
		return $this->subject;
	}

	/**
	 * Set subject
	 *
	 * @param string $subject
	 * @return Message
	 */
	public function setSubject($subject)
	{
		$this->subject = $subject;

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

	public function getFormattedText()
	{
		return nl2br($this->getText());
	}

	/**
	 * Set text
	 *
	 * @param string $text
	 * @return Message
	 */
	public function setText($text)
	{
		$this->text = $text;

		return $this;
	}

	/**
	 * Get dateSent
	 *
	 * @return \DateTime
	 */
	public function getDateSent()
	{
		return $this->dateSent;
	}

	public function getFormattedDateSent() {

		$date = $this->getDateSent();
		if(!is_null($date)) {

			return $date->format('d.m.Y H:i');
		}
		return '';
	}

	/**
	 * Set dateSent
	 *
	 * @param \DateTime $dateSent
	 * @return Message
	 */
	public function setDateSent($dateSent)
	{
		$this->dateSent = $dateSent;

		return $this;
	}

	/**
	 * Get dateReceived
	 *
	 * @return \DateTime
	 */
	public function getDateReceived()
	{
		return $this->dateReceived;
	}

	/**
	 * Set dateReceived
	 *
	 * @param \DateTime $dateReceived
	 * @return Message
	 */
	public function setDateReceived($dateReceived)
	{
		$this->dateReceived = $dateReceived;

		return $this;
	}
}
