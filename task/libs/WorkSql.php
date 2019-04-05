<?php

include_once 'Sql.php';
include_once '/home/user14/public_html/PHP/php_task4/php_task4/config.php';

class WorkSql extends Sql
{
    /*function __construct()
    {
        parent::__construct();
    }*/
    function connect()
    {
        $connection = new PDO('mysql:host='.HOST.';dbname='.DATABASE.';charset=utf8', USER_NAME, USER_PASS);
    }
    


}

