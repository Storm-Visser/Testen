<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>report a bug</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    </form>
    <?php
        if (empty($_POST[])) {
            echo "enter all fields";
        } else {
            $DBConnect = mysqli_connect("127.0.0.1", "root", "");
            if ($DBConnect == FALSE) {
                echo "Unable to connect to the database server";
            } else {
                $DBName = "gerecht";
                if (!mysqli_select_db($DBConnect, $DBName)) {
                    $SQLstring = "CREATE DATABASE `" . $DBName . "`";
                    if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
                        $QueryResult = mysqli_stmt_execute($stmt);
                        if ($QueryResult === FALSE) {
                            echo "Unable to create the database<br>";
                        } else {
                            echo "this is the first product<br>";
                        }
                        mysqli_stmt_close($stmt);
                    }
                }
                mysqli_select_db($DBConnect, $DBName);
                $TableName = "gerecht";
                $SQLstring = "SHOW TABLES LIKE '" . $TableName . "' ";
                if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) == 0) {
                        mysqli_stmt_close($stmt);
                        $SQLstring = "CREATE TABLE " . $TableName . "(countID
        SMALLINT NOT NULL AUTO_INCREMENT
        PRIMARY KEY, bug_title VARCHAR(40),
        product_name VARCHAR(40),
        product_version VARCHAR(40),
        hardware_type VARCHAR(40),
        OS VARCHAR(40),
        frequency VARCHAR(40),
        sollution VARCHAR(100))";
                        if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
                            $QueryResult = mysqli_stmt_execute($stmt);
                            if ($QueryResult === FALSE) {
                                echo "Unable to create the table";
                            } else {
                                echo "table created";
                            }
                            mysqli_stmt_close($stmt);
                        }
                    }
                }
                $bugID = htmlentities($_POST['bugtitle']);
                $prodName = htmlentities($_POST['name']);
                $prodVersion = htmlentities($_POST['version']);
                $HardwareType = htmlentities($_POST['hardware']);
                $OS = htmlentities($_POST['OS']);
                $freq = htmlentities($_POST['frequency']);
                $soll = htmlentities($_POST['sollution']);

                $SQLstring2 = "INSERT INTO " . $TableName . " VALUES(NULL, ?, ?, ?, ?, ?, ?, ?)";
                if ($stmt = mysqli_prepare($DBConnect, $SQLstring2)) {
                    mysqli_stmt_bind_param($stmt, 'sssssss', $bugID, $prodName, $prodVersion, $HardwareType, $OS, $freq, $soll);
                    $QueryResult2 = mysqli_stmt_execute($stmt);
                    if ($QueryResult2 === FALSE) {
                        echo "query failed";
                    } else {
                        echo "<h1>Thank you for reportig a bug</h1>";
                    }
                    mysqli_stmt_close($stmt);
                }
                mysqli_close($DBConnect);
            }
        }
    ?>
    <a href="bug_rep.php">home</a>
</body>

</html>