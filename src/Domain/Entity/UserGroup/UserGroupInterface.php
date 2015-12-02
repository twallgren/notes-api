<?php
/**
 * Created by PhpStorm.
 * User: Taylor
 * Date: 11/3/2015
 * Time: 7:23 PM
 */
namespace Notes\Domain\Entity\UserGroup;
use Notes\Domain\Entity\User;

interface UserGroupInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return array
     */
    public function getUsers();

    /**
     * @param User $user
     * @return bool
     */
    public function addUser(User $user);

    /**
     * @param User $user
     * @return bool
     */
    public function removeUser(User $user);

    public function getPermissions();

    public function hasPermission(int $permission);
}
