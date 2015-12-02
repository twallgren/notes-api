<?php

namespace Notes\Domain\Entity\UserGroup;
use Notes\Domain\Entity\User;
use Notes\Domain\Entity\UserGroup\UserGroupInterface;
use Notes\Domain\ValueObject\Permissions;

class Owner implements UserGroupInterface
{
    public $permissions = [];
    public function __construct()
    {
        $this->permissions[]=Permissions::ADD_NOTE;
        $this->permissions[]=Permissions::READ_NOTE;
        $this->permissions[]=Permissions::MODIFY_NOTE;
        $this->permissions[]=Permissions::DELETE_NOTE;
    }

    /**
     * @return string
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        // TODO: Implement getUsers() method.
    }

    /**
     * @param User $user
     * @return bool
     */
    public function addUser(User $user)
    {
        // TODO: Implement addUser() method.
    }

    /**
     * @param User $user
     * @return bool
     */
    public function removeUser(User $user)
    {
        // TODO: Implement removeUser() method.
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function hasPermission(int $permission)
    {
        foreach($this->permissions as $perm){
            if($perm==$permission)
            {
                return true;
            }
        }
        return false;
    }
}

