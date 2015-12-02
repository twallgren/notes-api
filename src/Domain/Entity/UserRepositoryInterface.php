<?php
/**
 * Created by PhpStorm.
 * User: Taylor
 * Date: 11/17/2015
 * Time: 5:51 PM
 */

namespace Notes\Domain\Entity;
use Notes\Domain\ValueObject\Uuid;

interface UserRepositoryInterface
{
    public function add(User $user);
    public function getUsers();
    public function getByUsername($username);
    public function getById(Uuid $id);
    public function modifyById(Uuid $id, User $user);
    public function removeById(Uuid $id);
    public function count();
}
