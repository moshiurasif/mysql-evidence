<?php
require "db.php";
if (isset($_GET['delete'])) {
    $deleteId = $_GET['deleteid'];
    if ($deleteId) {
        $myShowQuery = "delete from manufacturer where id='" . $deleteId . "'";
        $conn->query($myShowQuery);

        $message =  "<p style='color:green'>manufacturer with id: $deleteId deleted</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trigger</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
</head>

<body>
    <div class="container">
        <h1 style="text-align:center">Trigger</h1>
        <div class="row">
            <div class="column-60">
                <form>
                    <fieldset>

                        <label for="manufacturer">Manufacturer</label>
                        <?php
                        $selectQuery = "select * from manufacturer";
                        $result = $conn->query($selectQuery);


                        echo '<select id="manufacturer" name="deleteid">';
                        while (list($id, $name) = $result->fetch_row()) {
                            echo "<option value=" . $id . ">" . $name . " - " . $id . "</option>";
                        }

                        echo '</select>';
                        ?>
                        <input class="button-primary" type="submit" value="Delete" name="delete">
                    </fieldset>
                </form>
                <?= $message ?>
            </div>
        </div>
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Manufacturer Id</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $productQuery = "select * from product";
                    $r = $conn->query($productQuery);
                    while (list($id, $name, $price, $manufactid) = $r->fetch_row()) {
                        echo "<tr>";
                        echo  "<td>" . $id . "</td>";
                        echo  "<td>" . $name . "</td>";
                        echo  "<td>" . $price . "</td>";
                        echo  "<td>" . $manufactid . "</td>";

                        echo "</tr>";
                    }

                    $conn->close();
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</body>

</html>