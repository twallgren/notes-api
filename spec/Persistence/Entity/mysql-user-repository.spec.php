<?php
/**
 * Created by PhpStorm.
 * User: Taylor
 * Date: 11/17/2015
 * Time: 6:47 PM
 */
use Notes\Persistence\Entity\MysqlUserRepository;
use Notes\Db\Adapter\PdoAdapter;
use \Notes\Domain\Entity\UserFactory;
use \Notes\Domain\Entity\User;
use \Notes\Domain\ValueObject\StringLiteral;
describe('Notes\Persistence\Entity\MysqlUserRepository',function() {
    beforeEach(function(){
        $this->repo = new MysqlUserRepository();
        $this->userFactory = new UserFactory();
        $this->faker = \Faker\Factory::create();
    });
    describe('->__construct()', function () {
        it('should construct an MysqlUserRepository object', function () {
            expect($this->repo)->to->be->instanceof('Notes\Persistence\Entity\MysqlUserRepository');
        });
    });
    describe('->add()', function () {
        it('should add 1 user to the repository', function () {
            $count = $this->repo->count();
            $this->repo->add($this->userFactory->create());
            expect($this->repo->count())->to->be->equal($count+1);
        });
    });
    describe('->getUsers()', function () {
        it('should return a user array', function () {
            $actual=$this->repo->getUsers();
            expect(is_array($actual))->equal(true);
            expect(($actual[0]))->to->be->instanceof('Notes\Domain\Entity\User');;
        });
    });
    describe('->getByUsername()', function(){
        it('should return the user with the specified username', function(){
            $actual=$this->repo->getByUsername("testUsername");
            expect(($actual))->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->getById()', function(){
        it('should return the user with the specified id', function(){
            $actual=$this->repo->getById("4840f14b-6ead-4c14-9519-20cafadaa9d1");
            expect(($actual))->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->modifyById()', function(){
        it('should modify the user with the specified id', function(){
            $id = "50090c61-f944-4950-96f6-950c6d1370e9";
            $username = $this->faker->userName;
            $firstName = $this->faker->firstName;
            $lastName = $this->faker->lastName;
            $newUser = new User($id);
            $newUser->setUsername($username);
            $newUser->setFirstName($firstName);
            $newUser->setLastName($lastName);
            expect($this->repo->modifyById($id,$newUser))->equal(true);
            $actual=$this->repo->getById($id);
            expect($actual->getUsername())->equal($username);
            expect($actual->getFirstName())->equal($firstName);
            expect($actual->getLastName())->equal($lastName);
        });
    });
    describe('->removeById()', function(){
        it('should remove the user with the specified id', function(){
            $newUser = $this->userFactory->create();
            $this->repo->add($newUser);
            expect($this->repo->getById($newUser->getId()))->instanceof('Notes\Domain\Entity\User');
            $this->repo->removeById($newUser->getId());
            expect($this->repo->getById($newUser->getId()))->equal(false);
        });
    });
    describe('->count()', function(){
        it('should return the count of users in the table', function(){
            expect(is_int($this->repo->count()))->equal(true);
        });
    });
});
