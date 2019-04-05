<?php
include_once 'Sql.php';
include_once '/home/user14/public_html/PHP/php_task4/php_task4/config.php';

class PgSql extends Sql
{
    protected $connection;
    protected $obj;

    function __construct()
    {
        parent::__construct();
        $this->connection = "";
    }

    function connect()
    {
        $this->connection = "host=" . HOST . " dbname=" . DATABASE . " user=" . USER_NAME . " password=" . USER_PASS."";
        $connect = pg_connect($this->connection);
        if (!$connect) {
            return "Can not connect to PgSql";
        }
    }


    function select()
    {
        parent::select();
        $query = $this->querySelectPgSql;
        //echo $this->querySelectPgSql;
        $q = pg_query($query);
        if($q){
            $result = array();
            $index = 0;
            while ($row = pg_fetch_row($q)) {
                $result[$index] = $row;
                $index++;
            }
            return $result;
        }else {
            return "Bad";
        }
    }

    function update()
    {
        parent::update();
        $query = $this->queryUpdatePgSql;
        //echo $this->queryUpdatePgSql;
        $result = pg_query($this->queryUpdatePgSql);
        if ($result) {
            return "The field is updated";
        } else {
            return "The field is NOT updated";
        }
    }

    function insert()
    {
        parent::insert();
        $query = $this->queryInsertPgSql;
        //echo $this->queryInsertPgSql;
        $result = pg_query($query);
        if ($result) {
            return "The field is added";
        } else {
            return "The field is NOT added";
        }
    }

    function delete()
    {
        parent::delete();
        $query = $this->queryDeletePgSql;
        $result = pg_query($query);
        if ($result) {
            return "The field is deleted";
        } else {
            return "The field is NOT deleted";
        }
    }

    public function unsetValues()
    {
        parent::unsetValues();
    }

    public function unsetFields()
    {
        parent::unsetFields();
    }
}

?>