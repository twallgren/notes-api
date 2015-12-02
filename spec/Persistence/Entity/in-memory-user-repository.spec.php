<?php
/**
 * Created by PhpStorm.
 * User: Taylor
 * Date: 11/17/2015
 * Time: 6:47 PM
 */
use Notes\Persistence\Entity\InMemoryUserRepository;
use \Notes\Domain\Entity\UserFactory;
use \Notes\Domain\ValueObject\StringLiteral;
describe('Notes\Persistence\Entity\InMemoryUserRepository',function() {
    beforeEach(function(){
        $this->repo = new InMemoryUserRepository();
        $this->userFactory = new UserFactory();
    });
    describe('->__construct()', function () {
        it('should construct an InMemoryUserRepository object', function () {
            expect($this->repo)->to->be->instanceof('Notes\Persistence\Entity\InMemoryUserRepository');
        });
    });
    describe('->add()', function () {
        it('should add 1 user to the repository', function () {
            $this->repo->add($this->userFactory->create());
            expect($this->repo->count())->to->be->equal(1);
        });
    });
    describe('->getByUsername()', function () {
        it('should return a user object', function () {
            $user = $this->userFactory->create();
            $user->setUsername(new StringLiteral("test"));
            $this->repo->add($user);
            expect($this->repo->count())->to->be->equal(1);
            $actual = $this->repo->getByUsername("test");
            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->getById()', function(){
        it('should return a user object', function () {
            $user = $this->userFactory->create();
            $id = $user->getId();
            $this->repo->add($user);
            expect($this->repo->count())->to->be->equal(1);
            $actual = $this->repo->getById($id);
            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->add()', function(){
        it('should add a user to the repo', function(){
            $user = $this->userFactory->create();
            $this->repo->add($user);
            expect($this->repo->count())->to->be->equal(1);
        });
    });
    describe('->getUsers()', function(){
        it('should return a User array', function(){
            $user1 = $this->userFactory->create();
            $user2 = $this->userFactory->create();
            $this->repo->add($user1);
            $this->repo->add($user2);
            expect(is_array($this->repo->getUsers()))->equal(true);
            expect($this->repo->getUsers()[0])->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->count()', function(){
        it('should return the count of Users in repo', function(){
            $user = $this->userFactory->create();
            $this->repo->add($user);
            expect($this->repo->count())->to->be->equal(1);
        });
    });
    describe('->modifyById()', function(){
        it('should replace existing user with new user', function(){
            $user1 = $this->userFactory->create();
            $user2 = $this->userFactory->create();
            $this->repo->add($user1);
            $this->repo->modifyById($user1->getId(),$user2);
            expect($this->repo->getUsers()[0])->equal($user2);
            expect($this->repo->getUsers()[0])->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->removeById()', function(){
        it('should remove user from repo', function(){
            $user1 = $this->userFactory->create();
            $user2 = $this->userFactory->create();
            $this->repo->add($user1);
            $this->repo->add($user2);
            expect($this->repo->count())->equal(2);
            expect($this->repo->removeById($user1->getId()))->equal(true);
            expect($this->repo->count())->equal(1);
        });
    });
});
