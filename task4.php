<?php
    $link = mysql_connect("cs-sql2014.ua-net.ua.edu", "tmurphy", "11510265");
    if (!$link) {
        die('Not connected: '.mysql_error());
    }
    mysql_select_db('tmurphy') or die('Could not select database...');

    $query = "select * from animalemployee";
    $result = mysql_query($query);

    if (!$result) {
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
    $resume = createHeaders($result);
    fillTable($resume, $result);
    echo "</table";
    echo "<br>";
    echo "<hr>";
    echo "<h2> AnimalEmployee View </h2>";

    mysql_free_result($result);
    mysql_close($link);
