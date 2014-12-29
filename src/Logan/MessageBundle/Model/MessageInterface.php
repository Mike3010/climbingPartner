<?php

namespace Logan\MessageBundle\Model;

use Doctrine\ORM\Mapping as ORM;

interface MessageInterface
{
	public function getUserFromId();

	public function setUserFromId($userFromId);

	public function getUserToId();

	public function setUserToId($userToId);

	public function getId();

	public function getUserFrom();

	public function setUserFrom(\Logan\UserBundle\Entity\User $userFrom);

	public function getUserTo();

	public function setUserTo(\Logan\UserBundle\Entity\User $userTo);

	public function getSubject();

	public function setSubject($subject);

	public function getText();

	public function getFormattedText();

	public function setText($text);

	public function getDateSent();

	public function getFormattedDateSent();

	public function setDateSent($dateSent);

	public function getDateReceived();

	public function setDateReceived($dateReceived);
}
