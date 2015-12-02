<?php
use Notes\Domain\Entity\UserGroup\Admin;
use Notes\Domain\ValueObject\Permissions;
describe('Notes\Domain\Entity\UserGroup\Admin', function () {
    describe('->__construct()', function () {
        it('should return an Admin object', function () {
            $actual = new Admin();
            expect($actual)->to->be->instanceof('\Notes\Domain\Entity\UserGroup\Admin');
        });
    });
    describe('->getPermissions()', function () {
        it('should return an array of permission constants', function () {
            $actual = new Admin();
            $permissions = $actual->getPermissions();
            expect(is_array($permissions))->equal(true);
            expect(count($permissions))->equal(4);
        });
    });
    describe('->hasPermission()', function () {
        it('should return whether or not Admin has permission', function () {
            $actual = new Admin();
            expect($actual->hasPermission(Permissions::ADD_USER))->equal(true);
            expect($actual->hasPermission(Permissions::READ_USER))->equal(true);
            expect($actual->hasPermission(Permissions::MODIFY_USER))->equal(true);
            expect($actual->hasPermission(Permissions::DELETE_USER))->equal(true);
        });
    });
});
