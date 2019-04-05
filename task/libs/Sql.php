<?php

class Sql
{
    protected $fields;
    protected $table;
    protected $values;
    protected $whereField;
    protected $whereVal;
    protected $querySelectMySql;
    protected $queryInsertMySql;
    protected $queryUpdateMySql;
    protected $queryDeleteMySql;
    protected $querySelectPqSql;
    protected $queryInsertPqSql;
    protected $queryUpdatePqSql;
    protected $queryDeletePqSql;

    function __construct()
    {
        $this->fields = array();
        $this->values = array();
        $this->table = "";
        $this->whereField = "";
        $this->whereVal = "";
    }


    public function setFields($field)
    {
        if ($field != "*" && $field != "" ) {
            array_push($this->fields, $field);
            return true;
        } else {
            return false;
        }
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function unsetFields()
    {
        unset($this->fields);
    }


    public function setValues($value)
    {
        if ($value != "") {
            array_push($this->values, $value);
            return true;
        } else {
            return false;
        }
    }

    public function getValues()
    {
        return $this->values;
    }

    public function unsetValues()
    {
        unset($this->fields);
    }


    public function setWhereField($where)
    {
        if ($where != "") {
            $this->whereField = $where;
            return true;
        } else {
            return false;
        }
    }

    public function getWhereField()
    {
        return $this->whereField;
    }


    public function setWhereVal($where)
    {
        if ($where != "") {
            $this->whereVal = $where;
            return true;
        } else {
            return false;
        }
    }

    public function getWhereVal()
    {
        return $this->whereVal;
    }


    public function setTable($table)
    {
        $this->table = $table;
    }

    public function getTable()
    {
        return $this->table;
    }

    


    public function select()
    {
        $strMySql = "";
        $strPgSql = "";
        $strMySql = implode("`, `",$this->fields);
        $strPgSql = implode(", ",$this->fields);
        $this->querySelectMySql = "SELECT `" . $strMySql . "` FROM `" . $this->table . "` WHERE " . $this->whereField . "='" . $this->whereVal . "'";
        $this->querySelectPgSql = "SELECT " . $strPgSql . " FROM " . $this->table . " WHERE " . $this->whereField . " = '" . $this->whereVal . "';";
    }

    function insert()
    {
        $strFieldsMySql = implode("`, `",$this->fields);
        $strNameMySql = implode("', '",$this->values);
        $strFieldsPgSql = implode(", ",$this->fields);
        $strNamePgSql = implode("', '",$this->values);
        $this->queryInsertMySql = "INSERT"." INTO `" . $this->table . "`( `" . $strFieldsMySql . "`) " . "VALUES ('". $strNameMySql . "')";
        $this->queryInsertPgSql = "INSERT"." INTO " . $this->table . "( id," . $strFieldsPgSql . ") " . "VALUES ('4','". $strNamePgSql . "');";
        
    }

    function update()
    {
        for($i=0;$i<count($this->fields);$i++){
            $strMySqlFields[$i] = "`".$this->fields[$i]."`='".$this->values[$i]."'";
            $strPgSqlFields[$i] = $this->fields[$i]."='".$this->values [$i]."'";
        }
        $strMySql=implode(", ",$strMySqlFields);
        $strPgSql=implode(", ",$strPgSqlFields);
        $this->queryUpdateMySql = "UPDATE `" . $this->table . "` SET " . $strMySql . " WHERE " . $this->whereField . "='" . $this->whereVal . "'";
        $this->queryUpdatePgSql = "UPDATE " . $this->table . " SET " . $strPgSql. " WHERE " . $this->whereField . "='" . $this->whereVal . "';";
        
    }

    function delete()
    {
        $this->queryDeleteMySql = "DELETE"." FROM `" . $this->table . "` WHERE " . $this->whereField . "='" . $this->getWhereVal() . "'";
        $this->queryDeletePgSql = "DELETE"." FROM " . $this->table . " WHERE " . $this->whereField . "='" . $this->getWhereVal() . "';";
        
    }


}

?>