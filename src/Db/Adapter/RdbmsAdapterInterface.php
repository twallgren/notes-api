<?php
/**
 * Created by PhpStorm.
 * User: Taylor
 * Date: 11/24/2015
 * Time: 6:10 PM
 */

namespace Notes\Db\Adapter;


interface RdbmsAdapterInterface extends DbAdapterInterface
{
    public function insert($table,$data);
    public function update($table,$data,$criteria);
    public function delete($table,$criteria);
    public function select($table,$criteria);
    public function sql($sql);
    public function execute();
}
