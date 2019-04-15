<?php

include_once 'Sql.php';
include_once 'config.php';

class WorkSql extends Sql
{
    // private $mysql;
    //private $pgSql;
    private $str;

    function __construct($str)
    {
        parent::__construct();
        $this->str = $str;
    }

    public function select()
    {
        parent::select();
        $result = array();

        try {

            if ($this->str == "pgsql") {
                $port = PORTPGSQL;
            } else {
                $port = PORT;
            }

            $mysql = new PDO($this->str . ":host=" . HOST . ";port=" . $port . ";dbname=" . DATABASE /*. ";charset=utf8_unicode_ci"*/, USER_NAME, USER_PASS);
            $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $select = $mysql->prepare($this->querySelect);

            $select->execute();
            $index = 0;
            while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                $result[$index] = $row;
                $index++;
            }
        } catch (PDOException $e) {
            echo $str = 'Error:+ ' . $e->getMessage();
        }
        return $result;
    }

    public function insert()
    {
        parent::insert();
        $result = "";

        try {
            if ($this->str == "pgsql") {
                $port = PORTPGSQL;
            } else {
                $port = PORT;
            }

            $mysql = new PDO($this->str . ":host=" . HOST . ";port=" . $port . ";dbname=" . DATABASE /*. ";charset=utf8_unicode_ci"*/, USER_NAME, USER_PASS);
            $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $insert = $mysql->prepare($this->queryInsert);
            $insert->bindParam(':strName', $this->values[0]);
            $insert->bindParam(':strMail', $this->values[1]);
            //$res = $insert->execute();
            if ($insert->execute()) {
                $result = "The field was added";
            } else {
                $result = "The field was NOT added";
            }


        } catch (PDOException $e) {
            print_r($e->getTraceAsString());
            echo $str = 'Error: ' . $e->getMessage();
        }
        return $result;
    }

    public function update()
    {
        parent::update();
        $result = "";

        try {
            if ($this->str == "pgsql") {
                $port = PORTPGSQL;
            } else {
                $port = PORT;
            }

            $mysql = new PDO($this->str . ":host=" . HOST . ";port=" . $port . ";dbname=" . DATABASE /*. ";charset=utf8_unicode_ci"*/, USER_NAME, USER_PASS);
            $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $insert = $mysql->prepare($this->queryUpdate);
            $insert->bindParam(':whereVal', $this->whereVal);
            //echo $this->whereVal;
            //$res = $insert->execute();
            if ($insert->execute()) {
                $result = "The field was updated";
            } else {
                $result = "The field was NOT updated";
            }


        } catch (PDOException $e) {
            print_r($e->getTraceAsString());
            echo $str = 'Error: ' . $e->getMessage();
        }
        return $result;
    }

    public function delete()
    {
        parent::delete();
        $result = "";

        try {

            if ($this->str == "pgsql") {
                $port = PORTPGSQL;
            } else {
                $port = PORT;
            }

            $mysql = new PDO($this->str . ":host=" . HOST . ";port=" . $port . ";dbname=" . DATABASE /*. ";charset=utf8_unicode_ci"*/, USER_NAME, USER_PASS);
            $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $insert = $mysql->prepare($this->queryDelete);
            $insert->bindParam(':whereVal', $this->whereVal);
            //$res = $insert->execute();
            if ($insert->execute()) {
                $result = "The field was deleted";
            } else {
                $result = "The field was NOT deleted";
            }


        } catch (PDOException $e) {
            print_r($e->getTraceAsString());
            echo $str = 'Error: ' . $e->getMessage();
        }
        return $result;
    }


}

