<?php
include_once 'Sql.php';
include_once 'config.php';

class MySql extends Sql
{
    protected $connection;

    function __construct()
    {
        parent::__construct();

        $this->connection = "";
    }

    public function connect()
    {
        $this->connection = mysql_connect(HOST, USER_NAME, USER_PASS);
        if (!$this->connection) {
            return "Can not connect to PgSql";
        }else{
        mysql_select_db(DATABASE);
     }
        
    }


    public function select()
    {
        parent::select();
        $q = mysql_query($this->querySelectMySql);
        //echo $this->querySelectMySql;
        $result = array();
        $index = 0;
        while ($row = mysql_fetch_assoc($q)) {
            $result[$index] = $row;
            $index++;
        }
        return $result;
    }

    function update()
    {
        parent::update();
        $result = mysql_query($this->queryUpdateMySql);
        //echo $this->queryUpdateMySql;
        if ($result) {
            return "The field is updated";
        } else {
            return "The field is NOT updated";
        }
    }

    function insert()
    {
        parent::insert();
        $query = $this->queryInsertMySql;
        $result = mysql_query($query);
        if ($result) {
            return "The field is added";
        } else {
            return "The field is NOT added";
        }
    }

    function delete()
    {
        parent::delete();
        $result = mysql_query($this->queryDeleteMySql);
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