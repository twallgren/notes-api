<?php
namespace Notes\Domain\Entity;
use Notes\Domain\ValueObject\StringLiteral;
use Notes\Domain\ValueObject\Uuid;

class User
{
    /**
     * @var Uuid
     */
    public $id;
    /**
     * @var StringLiteral
     */
    public $username;
    /**
     * @var StringLiteral
     */
    public $firstName;
    /**
     * @var StringLiteral
     */
    public $lastName;

    /**
     * @param StringLiteral $username
     * @param StringLiteral $firstName
     * @param StringLiteral $lastName
     */
    public function __construct(Uuid $uuid)
    {
        $this->id = $uuid;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "ID: " . $this->id . " Username: '" . $this->username . "' First Name: '" . $this->firstName . "' Last Name: '" . $this->lastName . "'";
    }

    /**
     * @return Uuid
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return StringLiteral
     */
    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return StringLiteral
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return StringLiteral
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }
}
