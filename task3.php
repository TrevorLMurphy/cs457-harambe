<?php
    $link = mysql_connect("cs-sql2014.ua-net.ua.edu", "tmurphy", "11510265");
    if (!$link) {
        die('Not connected: '.mysql_error());
    }
    mysql_select_db('tmurphy') or die('Could not select database...');

    if (isset($_POST['checkID'])) {
        $query =
        "select employeeID, name, eName from zookeeper";
        $result = mysql_query($query);
        if (!$result) {
            die('SQL error: '.mysql_error());
        }
        echo "<table border='1'>";
        $resume = createHeaders($result);
        fillTable($resume, $result);
        mysql_free_result($result);
        echo "</table";
        echo "<br>";
        echo "<hr>";
        echo "<h2> EMPLOYEE ID'S </h2>";
    } elseif (isset($_POST['insert'])) {
        $id = $_POST['id'];
        $species = $_POST['species'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $status = $_POST['status'];
        $owner = $_POST['eid'];

        if ($status !== "alive" && $status !== "dead") {
            die("I said to enter dead or alive...not $status! Go back and try again!");
        }
        $species = "'" . $species . "'";
        $name = "'" . $name . "'";
        $status = "'" . $status . "'";

        // First, check if the Employee ID exists...
        $checkID = "select employeeID from zookeeper where employeeID = $owner";
        $result = mysql_query($checkID);
        $array = mysql_fetch_array($result);

        if (empty($array)) {
            die("EMPLOYEE ID NOT VALID, PLEASE TRY AGAIN!");
        }

        // Employees are tied to a specific exhibit, so get that exhibit...
        $getExhibit = mysql_query("select eName from zookeeper where employeeID = $owner");
        $exhibitArray = mysql_fetch_row($getExhibit);
        $exhibit = "'" . $exhibitArray[0] . "'";

        $query =
        "insert into animal
         (animalID, species, animalName, animalAge, aliveOrDead, empID, exName)
         values (
         $id,
         $species,
         $name,
         $age,
         $status,
         $owner,
         $exhibit)";

        $result = mysql_query($query);
        if (!$result) {
            die('SQL error: '.mysql_error());
        }
        // mysql_free_result($result); Freeing the result produced problems...
        print "<h2>YOUR VALUES HAVE BEEN INSERTED! GO BACK TO SEE THEM OR QUERY!</h2>";
    } elseif (isset($_POST['display'])) {
        $query =
        "select * from animal";
        $result = mysql_query($query);
        if (!$result) {
            die('SQL error: '.mysql_error());
        }

        echo "<table border='1'>";
        $resume = createHeaders($result);
        fillTable($resume, $result);
        mysql_free_result($result);
        echo "</table";
        echo "<br>";
        echo "<hr>";
        echo "<h2> DISPLAY </h2>";
    } else {
        $age = $_POST['query'];
        $query =
        "select animalName, animalAge from animal
         where animalAge > $age";
        $result = mysql_query($query);
        if (!$result) {
            die('SQL error: '.mysql_error());
        }

        echo "<table border='1'>";
        $resume = createHeaders($result);
        fillTable($resume, $result);
        mysql_free_result($result);
        echo "</table";
        echo "<br>";
        echo "<hr>";
        echo "<h2> QUERY </h2>";
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

    mysql_close($link);
?>
