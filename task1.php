<?php
    $link = mysql_connect("cs-sql2014.ua-net.ua.edu", "tmurphy", "11510265");
    if (!$link) {
        die('Not connected: '.mysql_error());
    }
    mysql_select_db('tmurphy') or die('Could not select database...');

    $query1 = "select * from zookeeper";
    $query2 = "select * from animal";
    $query3 = "select * from exhibit";
    $query4 = "select * from department";
    $query5 = "select * from manager";

    $result1 = mysql_query($query1);
    $result2 = mysql_query($query2);
    $result3 = mysql_query($query3);
    $result4 = mysql_query($query4);
    $result5 = mysql_query($query5);

    if (!$result1 || !$result2 || !$result3 || !$result4 || !$result5) {
        die('SQL error: '.mysql_error());
    }

    function createHeaders($result) {
        $header = mysql_fetch_assoc($result);
        echo "<tr>";
        foreach ($header as $cname => $cvalue) {
            echo "<td><strong>" . $cname . "</strong></td>";
        }
        echo "</tr>";
        return $header;
    }

    function fillTable($resume, $result) {
        echo "<tr>";
        foreach ($resume as $cname => $cvalue) {
            echo "<td>" . $cvalue . "</td>";
        }
        echo "</tr>";

        while($row = mysql_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $cname => $cvalue) {
                echo "<td>" . $cvalue . "</td>";
            }
            echo "</tr>";
        }
    }

    echo "<table border='1'>";
    $resume = createHeaders($result1);
    fillTable($resume, $result1);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> ZOOKEEPER </h2>";

    echo "<table border='1'>";
    $resume = createHeaders($result2);
    fillTable($resume, $result2);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> ANIMAL </h2>";

    echo "<table border='1'>";
    $resume = createHeaders($result3);
    fillTable($resume, $result3);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> EXHIBIT </h2>";

    echo "<table border='1'>";
    $resume = createHeaders($result4);
    fillTable($resume, $result4);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> DEPARTMENT </h2>";

    echo "<table border='1'>";
    $resume = createHeaders($result5);
    fillTable($resume, $result5);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> MANAGER </h2>";

    mysql_free_result($result1);
    mysql_free_result($result2);
    mysql_free_result($result3);
    mysql_free_result($result4);
    mysql_free_result($result5);
    mysql_close($link);
?>
