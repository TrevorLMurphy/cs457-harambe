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

    echo "<table border='1'>";
    while($row = mysql_fetch_assoc($result1)) {
        echo "<tr>";
        foreach ($row as $cname => $cvalue) {
            echo "<td><strong>" . $cname . "</strong></td>";
        }
        echo "</tr>";

        echo "<tr>";
        foreach ($row as $cname => $cvalue) {
            echo "<td>" . $cvalue . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<hr>";

    echo "<table border='1'>";
    while($row = mysql_fetch_assoc($result2)) {
        echo "<tr>";
        foreach ($row as $cname => $cvalue) {
            echo "<td><strong>" . $cname . "</strong></td>";
        }
        echo "</tr>";

        echo "<tr>";
        foreach ($row as $cname => $cvalue) {
            echo "<td>" . $cvalue . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<hr>";

    echo "<table border='1'>";
    while($row = mysql_fetch_assoc($result3)) {
        echo "<tr>";
        foreach ($row as $cname => $cvalue) {
            echo "<td><strong>" . $cname . "</strong></td>";
        }
        echo "</tr>";

        echo "<tr>";
        foreach ($row as $cname => $cvalue) {
            echo "<td>" . $cvalue . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<hr>";

    echo "<table border='1'>";
    while($row = mysql_fetch_assoc($result4)) {
        echo "<tr>";
        foreach ($row as $cname => $cvalue) {
            echo "<td><strong>" . $cname . "</strong></td>";
        }
        echo "</tr>";

        echo "<tr>";
        foreach ($row as $cname => $cvalue) {
            echo "<td>" . $cvalue . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<hr>";

    echo "<table border='1'>";
    while($row = mysql_fetch_assoc($result5)) {
        echo "<tr>";
        foreach ($row as $cname => $cvalue) {
            echo "<td><strong>" . $cname . "</strong></td>";
        }
        echo "</tr>";

        echo "<tr>";
        foreach ($row as $cname => $cvalue) {
            echo "<td>" . $cvalue . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<hr>";

    mysql_free_result($result1);
    mysql_close($link);
