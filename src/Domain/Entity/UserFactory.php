<?php
/**
 * Created by PhpStorm.
 * User: Taylor
 * Date: 11/17/2015
 * Time: 6:15 PM
 */

namespace Notes\Domain\Entity;
use Notes\Domain\FactoryInterface;
use Notes\Domain\ValueObject\Uuid;


class UserFactory implements FactoryInterface
{
    public function create()
    {
        return new User(new Uuid());
    }
}
