<?php
/**
 * Created by PhpStorm.
 * User: Taylor
 * Date: 11/24/2015
 * Time: 6:14 PM
 */

namespace Notes\Db\Adapter;


use Symfony\Component\Config\Definition\Exception\Exception;

class PdoAdapter implements RdbmsAdapterInterface
{
    protected $dsn;
    protected $username;
    protected $password;
    protected $pdo;

    public function __construct($dsn,$username,$password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect()
    {
        try{
            $this->pdo = new \PDO($this->dsn,$this->username,$this->password);
        } catch(Exception $e){
            die($e->getCode() . ': ' . $e->getMessage());
        }
    }

    public function close()
    {
        unset($this->pdo);
    }

    public function insert($table, $data)
    {
        // TODO: Implement insert() method.
    }

    public function update($table, $data, $criteria)
    {
        // TODO: Implement update() method.
    }

    public function delete($table, $criteria)
    {
        // TODO: Implement delete() method.
    }

    public function select($table, $criteria)
    {
        // TODO: Implement select() method.
    }

    public function sql($sql)
    {
        // TODO: Implement sql() method.
    }

    public function execute()
    {
        // TODO: Implement execute() method.
    }
}
