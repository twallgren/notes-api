<?php
/**
 * Created by PhpStorm.
 * User: Taylor
 * Date: 11/24/2015
 * Time: 6:05 PM
 */

namespace Notes\Persistence\Entity;


use Notes\Domain\Entity\User;
use Notes\Domain\Entity\UserRepositoryInterface;
use Notes\Domain\ValueObject\Uuid;

class MysqlUserRepository implements  UserRepositoryInterface
{
    protected $adapter;
    public function __construct(PdoAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function add(User $user)
    {
        // TODO: Implement add() method.
    }

    public function getUsers()
    {
        // TODO: Implement getUsers() method.
    }

    public function getByUsername($username)
    {
        // TODO: Implement getByUsername() method.
    }

    public function getById(Uuid $id)
    {
        // TODO: Implement getById() method.
    }

    public function modifyById(Uuid $id, User $user)
    {
        // TODO: Implement modifyById() method.
    }

    public function removeById(Uuid $id)
    {
        // TODO: Implement removeById() method.
    }

    public function count()
    {
        // TODO: Implement count() method.
    }
}
