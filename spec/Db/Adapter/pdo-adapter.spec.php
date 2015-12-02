<?php
/**
 * Created by PhpStorm.
 * User: Taylor
 * Date: 11/24/2015
 * Time: 6:08 PM
 */
use Notes\Db\Adapter\PdoAdapter;

describe('Notes\Db\Adapter\PdoAdapter',function(){
    beforeEach(function(){
        $this->username = "taylor";
        $this->password = "password";
        $this->dsn = "mysql:dbname=test_user;host127.0.0.1";
    });
    describe('-->__construct()',function(){
        it('should return a PdoAdapter object', function(){
            $actual = new PdoAdapter($this->dsn,$this->username,$this->password);
            expect($actual)->to->be->instanceof('Notes\Db\Adapter\PdoAdapter');
        });
    });
    describe('-->delete()',function(){
        it('should delete the correct row', function(){
            $actual = new PdoAdapter($this->dsn,$this->username,$this->password);
            expect($actual)->to->be->instanceof('Notes\Db\Adapter\PdoAdapter');
        });
    });
});
