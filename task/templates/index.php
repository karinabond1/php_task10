<?php
//include_once 'E:/PHP/OSPanel/domains/GFL/php_task1/task4/index.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

//MySql
echo "<b>MySql</b><br>";
foreach ($selectMySql as $key=>$field) {
    echo $selectMySql[$key]["name"]." ".$selectMySql[$key]["email"]."<br>";
}
echo $resInsertMySql.'<br>';
echo $resUpdateMySql.'<br>';
echo $resDeleteMySql.'<br>';
echo "<b>Distinct and Inner Join</b><br>";
foreach ($resDistinctInnerJoinMySql as $key=>$field) {
    echo $resDistinctInnerJoinMySql[$key]["name"]." ".$resDistinctInnerJoinMySql[$key]["email"]."<br>";
}

echo "<b>Distinct and Left Outer Join</b><br>";
foreach ($resDistinctLeftOuterJoinMySql as $key=>$field) {
    echo $resDistinctLeftOuterJoinMySql[$key]["name"]." ".$resDistinctLeftOuterJoinMySql[$key]["email"]."<br>";
}

echo "<b>Distinct and Right Outer Join</b><br>";
foreach ($resDistinctRightOuterJoinMySql as $key=>$field) {
    echo $resDistinctRightOuterJoinMySql[$key]["name"]." ".$resDistinctRightOuterJoinMySql[$key]["email"]."<br>";
}

echo "<b>Distinct and Cross Join</b><br>";
foreach ($resDistinctCrossJoinMySql as $key=>$field) {
    echo $resDistinctCrossJoinMySql[$key]["name"]." ".$resDistinctCrossJoinMySql[$key]["email"]."<br>";
}
echo "<b>Distinct and Cross Join Limit</b><br>";
foreach ($resDistinctCrossJoinLimitMySql as $key=>$field) {
    echo $resDistinctCrossJoinLimitMySql[$key]["name"]." ".$resDistinctCrossJoinLimitMySql[$key]["email"]."<br>";
}

echo "<b>Distinct and Natural Join</b><br>";
foreach ($resDistinctNaturalJoinMySql as $key=>$field) {
    echo $resDistinctNaturalJoinMySql[$key]["name"]." ".$resDistinctNaturalJoinMySql[$key]["email"]."<br>";
}

echo "<b>GroupBy HavingCount OrderBy</b><br>";
foreach ($resGroupByHavingCountOrderByMySql as $key=>$field) {
    echo $resGroupByHavingCountOrderByMySql[$key]["name"]." ".$resGroupByHavingCountOrderByMySql[$key]["email"]."<br>";
}

//PgSql
echo "<br><b>PgSql</b><br>";
/*foreach ($selectPgSql as $key=>$fields) {
    foreach($fields as $field){
        echo $field." ";
    }
}
echo '<br>'.$resInsertPgSql.'<br>';
echo $resUpdatePgSql.'<br>';
echo $resDeletePgSql.'<br>';
echo "<b>Distinct and Inner Join</b><br>";
foreach ($resDistinctInnerJoinPgSql as $key=>$fields) {
    foreach($fields as $field){
        echo $field." ";
    }
}
echo "<b>Distinct and Left Outer Join</b><br>";
foreach ($resDistinctLeftOuterJoinPgSql as $key=>$fields) {
    foreach($fields as $field){
        echo $field." ";
    }
}
echo "<b>Distinct and Right Outer Join</b><br>";
foreach ($resDistinctRightOuterJoinPgSql as $key=>$fields) {
    foreach($fields as $field){
        echo $field." ";
    }
}
echo "<b>Distinct and Cross Join</b><br>";
foreach ($resDistinctCrossJoinPgSql as $key=>$fields) {
    foreach($fields as $field){
        echo $field." ";
    }
}
echo "<b>Distinct and Cross Join Limit</b><br>";
foreach ($resDistinctCrossJoinLimitPgSql as $key=>$fields) {
    foreach($fields as $field){
        echo $field." ";
    }
}
echo "<b>Distinct and Natural Join</b><br>";
foreach ($resDistinctNaturalJoinPgSql as $key=>$fields) {
    foreach($fields as $field){
        echo $field." ";
    }
}
echo "<b>GroupBy HavingCount OrderBy</b><br>";
foreach ($resGroupByHavingCountOrderByPgSql as $key=>$fields) {
    foreach($fields as $field){
        echo $field." ";
    }
}*/



?>

</body>
</html>