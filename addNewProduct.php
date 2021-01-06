<?php include 'header.php' ?>
        <div id="content">
            <form action="addNewProduct.php" method="post">
                <input type="text" name="product" placeholder="Voeg een product toe">
                <input type="submit" name="submit">
            </form>
            <?php
            include 'DBConnect.php';
                if(isset($_POST['submit'])) 
                {
                    $product = $_POST['product'];
                    $sqlInsert = "INSERT INTO producten (product) VALUES (?);";
                    if(!$stmt = mysqli_prepare($conn, $sqlInsert)) 
                    {
                        echo "Failed to prepare statement";
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "s", $_POST['product']);
                        if(!mysqli_stmt_execute($stmt)) 
                        {
                            echo "Failed to execute statement";
                            exit();
                        } 
                        else 
                        {
                            mysqli_stmt_store_result($stmt);
                            echo "Het product is toegevoegd!";
                        }
                    }
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    header("Location: selectProduct.php");
                }
            ?>
        </div>
    </body>
</html>