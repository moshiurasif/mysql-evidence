<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Username and password checking system</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="column-40">
                <form method="post">
                    <label for="username">User Name</label>
                    <input type="text" placeholder="username" id="username" name="username">
                    <label for="password">Password</label>
                    <input type="password" placeholder="password" id="password" name="password">
                    <input class="button-primary" type="submit" value="Send" name="submit">
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $connection = new mysqli("localhost", "root", "", "company") or die("couldn't connect database");
        $selectQuery = "select * from user where username='" . $username . "' && userpassword='" . $password . "'";
        $result = $connection->query($selectQuery);
        if ($result->num_rows > 0) {
            echo "<h3>you are registered user</h3>";
        } else {
            echo "<h3>you are not registered user</h3>";
        }
        $result->free();
        $connection->close();
    }
    ?>
</body>

</html>