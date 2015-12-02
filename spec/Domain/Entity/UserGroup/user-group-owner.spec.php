<?php
use Notes\Domain\Entity\UserGroup\Owner;
use Notes\Domain\ValueObject\Permissions;
describe('Notes\Domain\Entity\UserGroup\Owner', function () {
    describe('->__construct()', function () {
        it('should return an Owner object', function () {
            $actual = new Owner();
            expect($actual)->to->be->instanceof('\Notes\Domain\Entity\UserGroup\Owner');
        });
    });
    describe('->getPermissions()', function () {
        it('should return an array of permission constants', function () {
            $actual = new Owner();
            expect(is_array($actual->getPermissions()))->equal(true);
        });
    });
    describe('->hasPermission()', function () {
        it('should return an Owner object', function () {
            $actual = new Owner();
            expect($actual->hasPermission(Permissions::ADD_NOTE))->equal(true);
            expect($actual->hasPermission(Permissions::READ_NOTE))->equal(true);
            expect($actual->hasPermission(Permissions::MODIFY_NOTE))->equal(true);
            expect($actual->hasPermission(Permissions::DELETE_NOTE))->equal(true);
        });
    });
});
