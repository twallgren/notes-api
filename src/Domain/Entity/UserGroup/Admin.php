<?php

namespace Notes\Domain\Entity\UserGroup;
use Notes\Domain\Entity\User;
use Notes\Domain\Entity\UserGroup\UserGroupInterface;
use Notes\Domain\ValueObject\Permissions;

class Admin implements UserGroupInterface
{
    public $permissions = array();
    function __construct()
    {
        $this->permissions[]=Permissions::ADD_USER;
        $this->permissions[]=Permissions::READ_USER;
        $this->permissions[]=Permissions::MODIFY_USER;
        $this->permissions[]=Permissions::DELETE_USER;
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

