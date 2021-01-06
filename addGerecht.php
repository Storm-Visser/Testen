<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>add a product</title>
</head>

<body>
    <?php
        include 'DBConnect.php';
        $Name = $_GET["name"];
        $TableName1 = "gerecht";
        $TableName2 = "boodschappenlijst";
        //haal de ingredienten op
        $query1 = "SELECT * FROM " . $TableName1 . " WHERE naam = '" . $Name . "'";
        if(!$stmt1 = mysqli_prepare($conn, $query1)) 
        {
            echo "Failed to prepare statement 1" , mysqli_error($conn);
        }
        else 
        {
            if(!mysqli_stmt_execute($stmt1)) 
            {
                echo "Failed to execute statement 1";
            }
            else 
            {
                mysqli_stmt_bind_result($stmt1, $naam, $igr1, $igr2, $igr3, $igr4, $igr5, $igr6, $igr7, $igr8);
                mysqli_stmt_store_result($stmt1);
                mysqli_stmt_fetch($stmt1);
            }
        }
        //zet het in de database
        $query2 = "INSERT INTO " . $TableName2 . " VALUES(NULL, ?),(NULL, ?),(NULL, ?),(NULL, ?),(NULL, ?),(NULL, ?),(NULL, ?),(NULL, ?)";
        if(!$stmt2 = mysqli_prepare($conn, $query2)) 
        {
            echo "Failed to prepare statement 2 " , mysqli_error($conn);
        }
        else 
        {
            mysqli_stmt_bind_param($stmt2, 'ssssssss', $igr1, $igr2, $igr3, $igr4, $igr5, $igr6, $igr7, $igr8);
            if(!mysqli_stmt_execute($stmt2)) 
            {
                header("Location: selectGerecht.php?R=2");
            }
            else 
            {
                header("Location: selectGerecht.php?R=1");
            }
        }
    ?>
</body>

</html>