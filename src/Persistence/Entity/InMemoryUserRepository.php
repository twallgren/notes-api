<?php
/**
 * Created by PhpStorm.
 * User: Taylor
 * Date: 11/17/2015
 * Time: 6:45 PM
 */

namespace Notes\Persistence\Entity;

use InvalidArgumentException;
use Notes\Domain\Entity\User;
use Notes\Domain\Entity\UserRepositoryInterface;
use Notes\Domain\ValueObject\Uuid;

class InMemoryUserRepository implements UserRepositoryInterface
{
    public $users;

    public function __construct()
    {
        $this->users = [];
    }

    public function add(User $user)
    {
        if(!$user instanceof User){
            throw new InvalidArgumentException(
                __METHOD__ . "(): $user has to be a User object"
            );
        }
        $this->users[] = $user;
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function count()
    {
        return count($this->users);
    }

    public function getByUsername($username)
    {
        $results = [];

        foreach($this->users as $user) {
            if ($user->getUsername()->__toString() === $username) {
                $results[] = $user;
            }
        }

        if ($this->count() == 1) {
            return $results[0];
        }

        return $results;
    }

    public function getById(Uuid $id)
    {
        $results = [];

        foreach($this->users as $user) {
            if ($user->getId()->__toString() === $id->__toString()) {
                $results[] = $user;
            }
        }

        if ($this->count() == 1) {
            return $results[0];
        }

        return $results;
    }

    public function modifyById(Uuid $id, User $newUser)
    {
        foreach($this->users as $i => $user) {
            if ($user->getId()->__toString() === $id->__toString()) {
                $this->users[$i]=$newUser;
                return true;
            }
        }

        return false;
    }

    public function removeById(Uuid $id)
    {
        foreach($this->users as $i => $user) {
            /** @var \Notes\Domain\Entity\User $user*/
            if ($user->getId()->__toString() === $id->__toString()) {
                unset($this->users[$i]);
                return true;
            }
        }

        return false;
    }
}
