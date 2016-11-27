<?php
    $link = mysql_connect("cs-sql2014.ua-net.ua.edu", "tmurphy", "11510265");
    if (!$link) {
        die('Not connected: '.mysql_error());
    }
    mysql_select_db('tmurphy') or die('Could not select database...');



    if (isset($_POST['statusButton'])) {
        $status = $_POST['status'];
        if ($status !== "alive" && $status !== "dead") {
            die("I said to enter dead or alive...not $status! Go back and try again!");
        }
        $status = "'" . $status . "'";
        $query =
        "select animalName from animal
         where aliveOrDead = $status";
        $result = mysql_query($query);
    } else {
        $exhibit = $_POST['exhibit'];
        if ($exhibit !== "Amphibians" &&
            $exhibit !== "Reptiles" &&
            $exhibit !== "Mammals" &&
            $exhibit !== "Birds" &&
            $exhibit !== "Fish") {
            die("$exhibit is not a valid exhibit name! Go back and try again!");
        }
        $exhibit = "'" . $exhibit . "'";
        $query =
        "select employeeID, name, eName, ecosystem from zookeeper, exhibit
         where dname = $exhibit and eName = exhibitName";
        $result = mysql_query($query);
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
    echo "<h2> QUERY RESULT </h2>";

    mysql_free_result($result);
    mysql_close($link);
