<?php

include_once 'Sql.php';
include_once 'config.php';

class WorkSql extends Sql
{
    private $mysql;
    private $pgSql;

    function __construct()
    {
        parent::__construct();
    }

    public function connect()
    {
        try {
            //$this->mysql = new PDO("mysql:host=".HOST.";dbname=".DATABASE.";charset=utf8_unicode_ci", USER_NAME, USER_PASS);
            $this->pgSql = new PDO('pgsql:host=' . HOST . ';dbname=' . DATABASE . ";charset=utf8_unicode_ci", USER_NAME, USER_PASS);
            // $this->mysql->exec("set names utf8");
            //$this->pgSql->exec("set names utf8");
            //$this->mysql->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (PDOException $e) {
            $str = 'Error: ' . $e->getMessage();
        }
        return $str;
    }

    public function selectMysql()
    {
        parent::select();
        $result = array();
        $qury = $this->querySelectMySql;

        try {

            $mysql = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE /*. ";charset=utf8_unicode_ci"*/, USER_NAME, USER_PASS);
            $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $select = $mysql->prepare($this->querySelectMySql);

            //echo $this->querySelectMySql;
            //echo implode("`, `", $this->fields);
            $select->bindParam(fields  , $fields);
            $select->bindParam(table, $this->table);
            echo $this->table;
            $select->bindParam(whereField, $this->whereField);
            $select->bindParam(whereVal, $this->whereVal);
            $fields = implode(", ", $this->fields);
            
            $select->execute();
            echo $select->fetchAll();
            $index = 0;
            while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                $result[$index] = $row;
                $index++;
            }
        } catch (PDOException $e) {
            echo $str = 'Error: ' . $e->getMessage();
        }
        return $result;
    }

    public function selectPgSql()
    {
        $result = array();
        $select = $this->pgSql->prepare($this->querySelectMySql);
        $select->bindParam(':fields', implode("`, `", $this->fields));
        $select->bindParam(':table', implode("`, `", $this->table));
        $select->bindParam(':whereField', implode("`, `", $this->whereField));
        $select->bindParam(':whereVal', implode("`, `", $this->whereVal));
        $select->execute();
        $index = 0;
        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            $result[$index] = $row;
            $index++;
        }
        return $result;
    }


}

