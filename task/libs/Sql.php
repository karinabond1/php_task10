<?php

class Sql
{
    protected $fields;
    protected $table;
    protected $values;
    protected $whereField;
    protected $whereVal;
    protected $querySelect;
    protected $queryUpdate;
    protected $queryDelete;
    protected $queryInsert;
    protected $distinct;
    protected $innerJoin;
    protected $leftOuterJoin;
    protected $rightOuterJoin;
    protected $crossJoin;
    protected $naturalJoin;
    protected $group;
    protected $having;
    protected $order;
    protected $limit;
    protected $where;
    protected $oper;
    protected $mark;

    function __construct()
    {
        $this->fields = array();
        $this->values = array();
        $this->table = "";
        $this->whereField = "";
        $this->whereVal = "";
        $this->distinct = "";
        $this->innerJoin = "";
        $this->leftOuterJoin = "";
        $this->rightOuterJoin = "";
        $this->crossJoin = "";
        $this->naturalJoin = "";
        $this->group = "";
        $this->having = "";
        $this->order = "";
        $this->limit = "";
        $this->where = "";
        $this->oper = "";
        $this->mark = "";
    }


    public function setFields($field)
    {
        if ($field != "*" && $field != "") {
            array_push($this->fields, $field);
            return $this;
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
            return $this;
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
            $this->where = " WHERE ";
            $this->whereField = $where;
            return $this;
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
            $this->oper = "=";
            $this->whereVal = $where;

            return $this;
        } else {
            return false;
        }
    }

    public function mark()
    {
        $this->mark = "'";
        return $this;
    }

    public function getWhereVal()
    {
        return $this->whereVal;
    }


    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    public function getTable()
    {
        return $this->table;
    }


    public function select()
    {
        $strFields = implode(", ", $this->fields);
        //if($this->distinct != "")

        $this->querySelect = "SELECT " . $this->distinct . " " . $strFields . " FROM " . $this->table . " " . $this->innerJoin . $this->leftOuterJoin . $this->rightOuterJoin . $this->crossJoin . $this->naturalJoin . " " . $this->group . " " . $this->having . " " .$this->where. " ".$this->whereField . " " .$this->oper." ".$this->mark. $this->whereVal . $this->mark. " " . $this->order . " " . $this->limit;
        echo $this->querySelect;
    }

    function insert()
    {
        $strFields = implode(",", $this->fields);
        //echo $strFields;
        //$this->queryInsertMySql = "INSERT"." INTO `" . $this->table . "`( `" . $strFieldsMySql . "`) " . "VALUES ('". $strNameMySql . "')";
        $this->queryInsert = "INSERT" . " INTO " . $this->table . "(" . $strFields . ") " . "VALUES (:strName, :strMail);";
        //echo "<p>".$this->queryInsert."<p>";

    }

    function update()
    {
        for ($i = 0; $i < count($this->fields); $i++) {
            $strFields[$i] = "" . $this->fields[$i] . "='" . $this->values[$i] . "'";
        }
        $str = implode(", ", $strFields);
        $this->queryUpdate = "UPDATE " . $this->table . " SET " . $str . " " . " " .$this->where. $this->whereField . " " .$this->oper." ". ':whereVal';
        //echo $this->queryUpdate;

    }

    function delete()
    {
        $this->queryDelete = "DELETE" . " FROM " . $this->table . " " . " " .$this->where. $this->whereField . " " .$this->oper." ". ":whereVal";


    }

    function distinct()
    {
        $this->distinct = "DISTINCT";
        return $this;
    }

    function innerJoin($table, $field, $value)
    {
        $this->innerJoin = "INNER JOIN " . $table . " ON " . $field . " = " . $value;
        return $this;
    }

    function leftOuterJoin($table, $field, $value)
    {
        $this->leftOuterJoin = "LEFT OUTER JOIN " . $table . " ON " . $field . " = " . $value;
        return $this;
    }

    function rightOuterJoin($table, $field, $value)
    {
        $this->rightOuterJoin = "RIGHT OUTER JOIN " . $table . " ON " . $field . " = " . $value;
        return $this;
    }

    function crossJoin($table)
    {
        $this->crossJoin = "CROSS JOIN " . $table;
        return $this;
    }

    function naturalJoin($table)
    {
        $this->naturalJoin = "NATURAL JOIN " . $table;
        return $this;
    }

    function groupBy($what)
    {
        $this->group = "GROUP BY " . $what;
        return $this;
    }

    function havingCount($fiels, $value, $operation)
    {
        $this->having = "HAVING COUNT(" . $fiels . ")" . $operation . $value;
        return $this;
    }

    function orderBy($val)
    {
        $this->order = "ORDER BY " . $val;
        return $this;
    }

    function limit($val)
    {
        $this->limit = "LIMIT " . $val;
        return $this;
    }


}

?>