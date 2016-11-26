<?php
    $link = mysql_connect("", "", "");
    if (!$link) {
        die('Not connected: '.mysql_error());
    }
    mysql_select_db('tmurphy') or die('Could not select database...');

    // $query1 =
    // "create table harambe
    // (
    // col1 varchar(255),
    // col2 varchar(255)
    // );";

    $query1 = "show tables";
    $query2 = "select * from animal";
    $query3 =
    "create table animal
    (
    animalID int(6) primary key,
    species varchar(30),
    name varchar(30),
    age int(3),
    aliveOrDead varChar(30),
    empID int(6),
    exName varChar(30)
    )";
    $query4 =
    "insert into animal values
    (
    90909,
    'Shark',
    'Jawz',
    12,
    'alive',
    123456,
    'Sharks are cool'
    )";

    $queryTestJoin =
    "select name, animalName from zookeeper, animal
     where employeeID = 123456 and employeeID = empID;";

    // $result1 = mysql_query($query1);
    $result2 = mysql_query($queryTestJoin);
    // $result3 = mysql_query($query3);
    // $result4 = mysql_query($query4);


    // if (!$result1) {
    //     die('SQL error: '.mysql_error());
    // }
    //
    // if (!$result2) {
    //     die('SQL error: '.mysql_error());
    // }

    // if (!$result3) {
    //     die('SQL error: '.mysql_error());
    // }

    // if (!$result4) {
    //     die('SQL error: '.mysql_error());
    // }

    // while($row = mysql_fetch_assoc($result1)){
    //     foreach($row as $cname => $cvalue){
    //         print "$cname: $cvalue\t";
    //     }
    //     print "\r\n";
    //     print "<br/>";
    // }
    //
    while($row = mysql_fetch_assoc($result2)){
        foreach($row as $cname => $cvalue){
            print "$cname: $cvalue\t";
            print "<br/>";
        }
        print "\r\n";
        print "<br/>";
    }

    mysql_close($link);
