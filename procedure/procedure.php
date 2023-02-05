<?php
require "db.php";
if (isset($_GET["submit"])) {
    $name = $_GET["name"];
    $address = $_GET["address"];
    $contact = $_GET["contact"];
    $queryString = "call manufact('$name','$address','$contact')";
    // $myQuery = "call manufact($name,$address,$tel)";
    $result = $conn->query($queryString);
    if ($result) {
        echo "Data Added!!";
    } else echo "Error!!!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column-60">
                <form>
                    <fieldset>
                        <label for="name">Name</label>
                        <input type="text" placeholder="name" id="name" name="name">

                        <label for="address">Address</label>
                        <textarea placeholder="Address" id="address" name="address"></textarea>
                        <label for="contact">Contact</label>
                        <input type="text" placeholder="phone number" id="contact" name="contact">
                        <input class="button-primary" type="submit" value="Submit" name="submit">
                    </fieldset>
                </form>
            </div>

        </div>
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $productQuery = "select * from manufacturer";
                    $r = $conn->query($productQuery);
                    while (list($id, $name, $address, $contact_number) = $r->fetch_row()) {
                        echo "<tr>";
                        echo  "<td>" . $id . "</td>";
                        echo  "<td>" . $name . "</td>";
                        echo  "<td>" . $address . "</td>";
                        echo  "<td>" . $contact_number . "</td>";

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