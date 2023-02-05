<?php
require "db.php";
if (isset($_POST['submit'])) {
    $q = "create or replace view products_view as select * from product where price>5000";
    $conn->query($q);
    echo "<h3>View Created</h3>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
</head>

<body>
    <div class="container">
        <h1>View From Products table where Price > 5000</h1>
        <div class="row">
            <div class="column-60">
                <form action="" method="post">
                    <input class="button-primary" type="submit" value="Create View" name="submit">

                </form>
                <form action="" method="post">
                    <input class="button-primary" type="submit" value="Show View Data" name="sv">

                </form>

            </div>
        </div>
        <div class="row">

            <?php
            if (isset($_POST['sv'])) { ?>

                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <!-- <th>Manufacturer Id</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = "select * from products_view";
                        $r = $conn->query($q);

                        while (list($id, $name, $price) = $r->fetch_row()) {
                            echo "<tr>";
                            echo  "<td>" . $id . "</td>";
                            echo  "<td>" . $name . "</td>";
                            echo  "<td>" . $price . "</td>";
                            // echo  "<td>" . $manufacturer_id . "</td>";

                            echo "</tr>";
                        }




                        $conn->close();
                        ?>


                    </tbody>
                </table>

            <?php } ?>
        </div>
    </div>
    </div>
</body>

</html>