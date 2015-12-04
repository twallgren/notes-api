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
    protected $connection;
    public function __construct()
    {
        $this->connection = mysqli_connect("localhost","taylor","password","notes");
    }

    public function add(User $user)
    {
        mysqli_query($this->connection,"INSERT INTO `user`(`id`, `username`, `firstName`, ".
            "`lastName`) VALUES ('".$user->getId()."','".$user->getUsername()."','".$user->getFirstName()."','".$user->getLastName()."');");
    }

    public function getUsers()
    {
        $result = mysqli_query($this->connection,"SELECT `id`, `username`, `firstName`, `lastName` FROM `user`;");
        $users=[];
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            $user = new User(new Uuid($row['id']));
            $user->setUsername($row['username']);
            $user->setFirstName($row['firstName']);
            $user->setLastName($row['lastName']);
            $users[]=$user;
            unset($user);
        }
        return $users;
    }

    public function getByUsername($username)
    {
        $result = mysqli_query($this->connection,"SELECT `id`, `username`, `firstName`, `lastName` ".
            "FROM `user` WHERE `username` = '".$username."';");
        print_r("SELECT `id`, `username`, `firstName`, `lastName` ".
            "FROM `user` WHERE `username` = '".$username."';");
        if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            $user = new User(new Uuid($row['id']));
            $user->setUsername($row['username']);
            $user->setFirstName($row['firstName']);
            $user->setLastName($row['lastName']);
            return $user;
        }
        return false;
    }

    public function getById(Uuid $id)
    {
        $result = mysqli_query($this->connection,"SELECT `id`, `username`, `firstName`, `lastName` FROM `user` WHERE `id` = '$id';");
        if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            $user = new User(new Uuid($row['id']));
            $user->setUsername($row['username']);
            $user->setFirstName($row['firstName']);
            $user->setLastName($row['lastName']);
            return $user;
        }
        return false;
    }

    public function modifyById(Uuid $id, User $user)
    {
        mysqli_query($this->connection,"UPDATE `user` SET `id`='".$user->getId()."',".
            "`username`='".$user->getUsername()."',`firstName`='".$user->getFirstName()."',`lastName`='".$user->getLastName()."' WHERE `id` = '$id';");
        if(mysqli_affected_rows($this->connection)>0){
            return true;
        }
        return false;
    }

    public function removeById(Uuid $id)
    {
        mysqli_query($this->connection,"DELETE FROM `user` WHERE `id` = '$id';");
        if(mysqli_affected_rows($this->connection)>0){
            return true;
        }
        return false;
    }

    public function count()
    {
        $result = mysqli_query($this->connection,"SELECT COUNT(*) as `count` FROM `user`;");
        if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            return (int)$row['count'];
        }
        return false;
    }
}
