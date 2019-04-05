<?php
include_once 'config.php';
include_once 'libs/MySql.php';
include_once 'libs/PgSql.php';
include_once 'libs/Sql.php';
include_once 'libs/WorkSql.php';



$sql = new Sql();
$pdo = new WorkSql();
$pdo->connect();
//select
/*
//$sql->select();
$mySql = new MySql();
$mySql->setTable(TABLE);
$mySql->setFields("name");
$mySql->setFields("email");
$mySql->setWhereField("name");
$mySql->setWhereVal("Derek");
//$mySql->setObj($sql);
$mysql_conn = $mySql->connect();
$arr_select = $mySql->select();
$pgSql = new PgSql();
$pgSql->setTable(TABLE);
$pgSql->setFields("name");
$pgSql->setFields("email");
$pgSql->setWhereField("name");
$pgSql->setWhereVal("Derek");
$pg_con = $pgSql->connect();
$pg_arr_select = $pgSql->select();
//insert
$mySql->setValues("John");
$mySql->setValues("john@example.com");
$pgSql->setValues("John");
$pgSql->setValues("john@example.com");
$res_insert = $mySql->insert();
$pg_res_insert = $pgSql->insert();
//update
//$sql->unsetFields();
//$sql->unsetValues();
$pgSql->unsetFields();
$pgSql->unsetValues();
$sql = new Sql();
$mySql2 = new MySql();
$pgSql2 = new PgSql();
$mySql2->setTable(TABLE);
$mySql2->setFields("email");
$mySql2->setValues("derkos@example.com");
$mySql2->setWhereField("name");
$mySql2->setWhereVal("Derek");
$pgSql2->setTable(TABLE);
$pgSql2->setFields("email");
$pgSql2->setValues("derkos@example.com");
$pgSql2->setWhereField("name");
$pgSql2->setWhereVal("Derek");

$res_update = $mySql2->update();
$pg_res_update = $pgSql2->update();
//delete
$mySql2->setWhereField("name");
$mySql2->setWhereVal("John");
$pgSql2->setWhereField("name");
$pgSql2->setWhereVal("John");
$res_delete = $mySql2->delete();
$pg_res_delete = $pgSql2->delete();*/




include 'templates/index.php';
?>