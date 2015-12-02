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
use \Notes\Domain\ValueObject\StringLiteral;
describe('Notes\Persistence\Entity\MysqlUserRepository',function() {
    beforeEach(function(){
        $this->repo = new MysqlUserRepository(new PdoAdapter($dsn,$username,$password));
        $this->userFactory = new UserFactory();
    });
    describe('->__construct()', function () {
        it('should construct an MysqlUserRepository object', function () {
            expect($this->repo)->to->be->instanceof('Notes\Persistence\Entity\MysqlUserRepository');
        });
    });
    describe('->add()', function () {
        it('should add 1 user to the repository', function () {
            $this->repo->add($this->userFactory->create());
            //expect($this->repo->count())->to->be->equal(1);
        });
    });
    describe('->getUser()', function () {
        it('should return a user object', function () {
            $user = $this->userFactory->create();
            $user->setUsername(new StringLiteral("test"));
            $this->repo->getByUsername();
        });
    });
});
