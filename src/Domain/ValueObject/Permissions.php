<?php
/**
 * Created by PhpStorm.
 * User: Taylor
 * Date: 11/19/2015
 * Time: 5:54 PM
 */

namespace Notes\Domain\ValueObject;


class Permissions
{
    const ADD_NOTE = 0;
    const READ_NOTE = 1;
    const MODIFY_NOTE = 2;
    const DELETE_NOTE = 3;
    const READ_OTHERS_NOTE = 4;
    const MODIFY_OTHERS_NOTE = 5;
    const DELETE_OTHERS_NOTE = 6;
    const ADD_USER = 7;
    const READ_USER = 8;
    const MODIFY_USER = 9;
    const DELETE_USER = 10;

}
