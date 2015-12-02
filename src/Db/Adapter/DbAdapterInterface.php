<?php
/**
 * Created by PhpStorm.
 * User: Taylor
 * Date: 11/24/2015
 * Time: 6:32 PM
 */

namespace Notes\Db\Adapter;


interface DbAdapterInterface
{
    public function connect();
    public function close();
}
