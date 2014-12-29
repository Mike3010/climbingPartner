<?php

namespace Logan\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Logan\UserBundle\Entity\UserRepository")

 */
class User implements UserInterface, \Serializable
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
	 * @ORM\Column(name="username", type="string", length=255)
	 *
	 * @Assert\NotBlank()
	 */
	private $username;

	/**
	 * @ORM\Column(name="password", type="string", length=255)
	 */
	private $password;

	/**
	 * @ORM\Column(name="lastlogin", type="datetime", nullable=true);
	 */
	private $lastlogin;

	/**
	 * @ORM\Column(name="registered", type="datetime", nullable=true);
	 */
	private $registered;

	/**
	 * @ORM\OneToOne(targetEntity="Logan\ClimbingPartnerBundle\Entity\Userdata", mappedBy="user")
	 */
	private $userdata;

	/**
	 * @ORM\OneToMany(targetEntity="Logan\MessageBundle\Entity\Message", mappedBy="userTo")
	 * @ORM\OrderBy({"dateSent" = "DESC"})
	 */
	private $messagesReceived;


	/**
	* @ORM\OneToMany(targetEntity="Logan\MessageBundle\Entity\Message", mappedBy="userFrom")
	* @ORM\OrderBy({"dateSent" = "DESC"})
	*/
	private $messagesSent;

	/**
	 * @var string
	 */
	private $plainPassword;

	/**
	 * @return string
	 */
	public function serialize()
	{
		return serialize(array(
			$this->id,
			$this->username,
			$this->password,
			// see section on salt below
			// $this->salt,
		));
	}

	/**
	 * @return void
	 */
	public function unserialize($serialized)
	{
		list (
			$this->id,
			$this->username,
			$this->password,
			// see section on salt below
			// $this->salt
			) = unserialize($serialized);
	}

	/**
	 * Returns the roles granted to the user.
	 *
	 * <code>
	 * public function getRoles()
	 * {
	 *     return array('ROLE_USER');
	 * }
	 * </code>
	 *
	 * Alternatively, the roles might be stored on a ``roles`` property,
	 * and populated in any number of different ways when the user object
	 * is created.
	 *
	 * @return Role[] The user roles
	 */
	public function getRoles()
	{
		return array('ROLE_USER');
	}

	/**
	 * Returns the password used to authenticate the user.
	 *
	 * This should be the encoded password. On authentication, a plain-text
	 * password will be salted, encoded, and then compared to this value.
	 *
	 * @return string The password
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Returns the salt that was originally used to encode the password.
	 *
	 * This can return null if the password was not encoded using a salt.
	 *
	 * @return string|null The salt
	 */
	public function getSalt()
	{
		return null;
	}

	/**
	 * Returns the username used to authenticate the user.
	 *
	 * @return string The username
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * Removes sensitive data from the user.
	 *
	 * This is important if, at any given point, sensitive information like
	 * the plain-text password is stored on this object.
	 */
	public function eraseCredentials()
	{
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
	 * Set username
	 *
	 * @param string $username
	 * @return User
	 */
	public function setUsername($username)
	{
		$this->username = $username;

		return $this;
	}

	/**
	 * Set password
	 *
	 * @param string $password
	 * @return User
	 */
	public function setPassword($password)
	{
		$this->password = $password;

		return $this;
	}

	public function getPlainPassword()
	{
		return $this->plainPassword;
	}

	public function setPlainPassword($plainPassword) {

		$this->plainPassword = $plainPassword;
	}

    /**
     * Set lastlogin
     *
     * @param \datetime $lastlogin
     * @return User
     */
    public function setLastlogin(\datetime $lastlogin)
    {
        $this->lastlogin = $lastlogin;

        return $this;
    }

    /**
     * Get lastlogin
     *
     * @return \datetime
     */
    public function getLastlogin()
    {
        return $this->lastlogin;
    }

    /**
     * Set registered
     *
     * @param \datetime $registered
     * @return User
     */
    public function setRegistered(\datetime $registered)
    {
        $this->registered = $registered;

        return $this;
    }

    /**
     * Get registered
     *
     * @return \datetime
     */
    public function getRegistered()
    {
        return $this->registered;
    }

    /**
     * Set userdata
     *
     * @param \Logan\ClimbingPartnerBundle\Entity\Userdata $userdata
     * @return User
     */
    public function setUserdata(\Logan\ClimbingPartnerBundle\Entity\Userdata $userdata = null)
    {
        $this->userdata = $userdata;

        return $this;
    }

    /**
     * Get userdata
     *
     * @return \Logan\ClimbingPartnerBundle\Entity\Userdata 
     */
    public function getUserdata()
    {
        return $this->userdata;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->messagesReceived = new \Doctrine\Common\Collections\ArrayCollection();
        $this->messagesSent = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add messagesReceived
     *
     * @param \Logan\MessageBundle\Entity\Message $messagesReceived
     * @return User
     */
    public function addMessagesReceived(\Logan\MessageBundle\Entity\Message $messagesReceived)
    {
        $this->messagesReceived[] = $messagesReceived;

        return $this;
    }

    /**
     * Remove messagesReceived
     *
     * @param \Logan\MessageBundle\Entity\Message $messagesReceived
     */
    public function removeMessagesReceived(\Logan\MessageBundle\Entity\Message $messagesReceived)
    {
        $this->messagesReceived->removeElement($messagesReceived);
    }

    /**
     * Get messagesReceived
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessagesReceived()
    {
        return $this->messagesReceived;
    }

    /**
     * Add messagesSent
     *
     * @param \Logan\MessageBundle\Entity\Message $messagesSent
     * @return User
     */
    public function addMessagesSent(\Logan\MessageBundle\Entity\Message $messagesSent)
    {
        $this->messagesSent[] = $messagesSent;

        return $this;
    }

    /**
     * Remove messagesSent
     *
     * @param \Logan\MessageBundle\Entity\Message $messagesSent
     */
    public function removeMessagesSent(\Logan\MessageBundle\Entity\Message $messagesSent)
    {
        $this->messagesSent->removeElement($messagesSent);
    }

    /**
     * Get messagesSent
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessagesSent()
    {
        return $this->messagesSent;
    }
}
