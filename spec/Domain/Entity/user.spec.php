<?php
use Notes\Domain\Entity\User;
use Notes\Domain\Entity\UserFactory;
use Notes\Domain\ValueObject\StringLiteral;

describe('Notes\Domain\Entity\User',function(){
    describe('->__construct()',function(){
        it('should return a User object',function(){
            $faker = \Faker\Factory::create();
            $uuid = new StringLiteral($faker->uuid);
            $actual = new User($uuid);
            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->__toString()',function(){
        it('should return a string with user information',function(){
            $faker = \Faker\Factory::create();
            $uuid = new StringLiteral($faker->uuid);
            $actual = new User($uuid);
            expect(is_string($actual->__toString()))->equal(true);
        });
    });
    describe('->getId()',function(){
        it('should return the User\'s id',function(){
            $userFactory = new UserFactory();
            $faker = \Faker\Factory::create();
            $uuid = new StringLiteral($faker->uuid);
            $actual = new User($uuid);
            $actual = $userFactory->create();
            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
            expect($actual->getId())->to->be->instanceof('Notes\Domain\ValueObject\Uuid');
        });
    });
    describe('->getUsername()',function(){
        it('should return the User\'s username',function(){
            $faker = \Faker\Factory::create();
            $uuid = new StringLiteral($faker->uuid);
            $username = new StringLiteral($faker->userName);
            $actual = new User($uuid);
            $actual->setUsername($username);
            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
            expect($actual->getUsername())->equal($username);
        });
    });
    describe('->getFirstName()',function(){
        it('should return the User\'s first name',function(){
            $faker = \Faker\Factory::create();
            $uuid = new StringLiteral($faker->uuid);
            $firstName = new StringLiteral($faker->firstName);
            $actual = new User($uuid);
            $actual->setFirstName($firstName);
            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
            expect($actual->getFirstName())->equal($firstName);
        });
    });
    describe('->getLastName()',function(){
        it('should return the User\'s last name',function(){
            $faker = \Faker\Factory::create();
            $uuid = new StringLiteral($faker->uuid);
            $lastName = new StringLiteral($faker->lastName);
            $actual = new User($uuid);
            $actual->setLastName($lastName);
            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
            expect($actual->getLastName())->equal($lastName);
        });
    });
    describe('->setFirstName()',function(){
        it('should set the User\'s first name',function(){
            $faker = \Faker\Factory::create();
            $uuid = new StringLiteral($faker->uuid);
            $firstName = new StringLiteral($faker->firstName);
            $actual = new User($uuid);
            $actual->setFirstName($firstName);
            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
            expect($actual->getFirstName())->equal($firstName);
        });
    });
    describe('->setLastName()',function(){
        it('should set the User\'s last name',function(){
            $faker = \Faker\Factory::create();
            $uuid = new StringLiteral($faker->uuid);
            $lastName = new StringLiteral($faker->lastName);
            $actual = new User($uuid);
            $actual->setLastName($lastName);
            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
            expect($actual->getLastName())->equal($lastName);
        });
    });

});
