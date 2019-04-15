<?php
include_once 'config.php';
include_once 'libs/Sql.php';
include_once 'libs/WorkSql.php';



$mySql = new WorkSql("mysql");
$selectMySql = $mySql->setTable(TABLE)->setFields("name")->setFields("email")->setWhereField("name")->setWhereVal("Derek")->mark()->select();


/*$pgSql = new WorkSql("pgsql");
$selectPgSql = $pgSql->setTable(TABLE)->setFields("name")->setFields("email")->setWhereField("name")->setWhereVal("Derek")->select();*/


//insert
$resInsertMySql = $mySql->setValues("John")->setValues("john@example.com")->insert();
//$resInsertPgSql = $pgSql->setValues("John")->setValues("john@example.com");


//update
$mySql2 = new WorkSql("mysql");
//$pgSql2 = new WorkSql("pgsql");
$resUpdateMySql = $mySql2->setTable(TABLE)->setFields("email")->setValues("derkos@example.com")->setWhereField("name")->setWhereVal("Derek")->update();


//$resUpdatePgSql = $pgSql2->setTable(TABLE)->setFields("email")->setValues("derkos@example.com")->setWhereField("name")->setWhereVal("Derek")->update();


//delete
$resDeleteMySql = $mySql2->setWhereField("name")->setWhereVal("John")->delete();

//$resDeletePgSql = $pgSql2->setWhereField("name")->setWhereVal("John")->delete();


//distinct innerJoin
$mySql3 = new WorkSql("mysql");
//$pgSql3 = new WorkSql("pgsql");
$resDistinctInnerJoinMySql = $mySql3->distinct()->setTable(TABLE)->setFields("users.name")->setFields("users.email")->innerJoin("other_users","users.name","other_users.name")->select();
//$resDistinctInnerJoinPgSql = $pgSql3->distinct()->setTable(TABLE)->setFields("users.name")->setFields("users.email")->innerJoin("other_users","users.name","other_users.name")->select();


//distinct LeftOuterJoin
$mySql4 = new WorkSql("mysql");
//$pgSql4 = new WorkSql("pgsql");
$resDistinctLeftOuterJoinMySql = $mySql4->distinct()->setTable(TABLE)->setFields("users.name")->setFields("users.email")->leftOuterJoin("other_users","users.name","other_users.name")->select();
//$resDistinctLeftOuterJoin = $pgSql4->distinct()->setTable(TABLE)->setFields("users.name")->setFields("users.email")->leftOuterJoin("other_users","users.name","other_users.name")->select();

//distinct RightOuterJoin
$mySql5 = new WorkSql("mysql");
//$pgSql5 = new WorkSql("pgsql");
$resDistinctRightOuterJoinMySql = $mySql5->distinct()->setTable(TABLE)->setFields("users.name")->setFields("users.email")->rightOuterJoin("other_users","users.name","other_users.name")->select();
//$resDistinctRightOuterJoin = $pgSql5->distinct()->setTable(TABLE)->setFields("users.name")->setFields("users.email")->rightOuterJoin("other_users","users.name","other_users.name")->select();


//distinct CrossJoin
$mySql6 = new WorkSql("mysql");
//$pgSql6 = new WorkSql("pgsql");
$resDistinctCrossJoinMySql = $mySql6->distinct()->setTable(TABLE)->setFields("users.name")->setFields("users.email")->crossJoin("other_users")->select();
//$resDistinctCrossJoinPgSql = $pgSql6->distinct()->setTable(TABLE)->setFields("users.name")->setFields("users.email")->crossJoin("other_users")->select();

//distinct CrossJoinLimit
$mySql61 = new WorkSql("mysql");
//$pgSql61 = new WorkSql("pgsql");
$resDistinctCrossJoinLimitMySql = $mySql61->distinct()->setTable(TABLE)->setFields("users.name")->setFields("users.email")->crossJoin("other_users")->limit(2)->select();
//$resDistinctCrossJoinLimitPgSql = $pgSql61->distinct()->setTable(TABLE)->setFields("users.name")->setFields("users.email")->crossJoin("other_users")->limit(2)->select();


//distinct NaturalJoin
$mySql7 = new WorkSql("mysql");
//$pgSql7 = new WorkSql("pgsql");
$resDistinctNaturalJoinMySql = $mySql7->distinct()->setTable(TABLE)->setFields("users.name")->setFields("users.email")->naturalJoin("other_users")->select();
//$resDistinctNaturalJoinPgSql = $pgSql7->distinct()->setTable(TABLE)->setFields("users.name")->setFields("users.email")->naturalJoin("other_users","users.name")->select();


//groupBy HavingCount OrderBy
$mySql8 = new WorkSql("mysql");
//$pgSql8 = new WorkSql("pgsql");
$resGroupByHavingCountOrderByMySql = $mySql8->setTable(TABLE)->setFields("name")->setFields("email")->groupBy("name,email")->havingCount("name",1,"=")->orderBy("name")->select();
//$resGroupByHavingCountOrderByPgSql = $pgSql8->setTable(TABLE)->setFields("name")->setFields("email")->groupBy("name")->havingCount("name",2,"=")->orderBy("name")->select();


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