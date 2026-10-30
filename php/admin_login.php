<?php
session_start();
require "connection.php";
$error_message = "";

if (isset($_POST['login_btn'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM admin_tbl WHERE admin_name = '$username' AND admin_password = '$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['loggedin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error_message = "invalid.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/script.js" defer></script>

    <title>Remarks</title>
</head>

<body>

    <!--header-->
    <div id="header">

        <div id="header-left">
            <h1 id="anotherHome"> Cookie Club </h1>
        </div>

        <div id="header-right">
            <h4 id="topContact"> Contacts </h4>
        </div>

    </div>

    <div id="login-container">

            <?php if ($error_message != ""): ?>
            <div style="color: red; font-weight: bold; margin-bottom: 10px; text-align: center;">
                        <?php echo $error_message; ?>
            </div>
                <?php endif; ?>

        <form action="admin_login.php" method="POST">
            <table class="login-table">
                <tr>
                    <td><label for="username">Username</label></td>
                    <td><input type="text" name="username" id="username" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td><label for="password">Password</td>
                    <td><input type="password" name="password" id="password" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;" class="c-desc">
                        <button type="submit" name="login_btn">Login</button>
                    </td>
                </tr>
            </table>

        </form>

    </div>

    <!--footer-->
    <div id="footer">

        <div id="footer-left">
            <h4 id="about"> About Us </h4>
        </div>

        <div id="footer-right">
            <!--
            <form action="php/remarks.php">
                <input type="submit" value="click on me!">
            </form>
            -->

            <h4 id="footContactInPHP"> <a href="remarks.php" class="your-button-class">Comments!</a></h4>
            <!---<h4 id="footContact"><a href="php/remarks.php" class="your-button-class">View Comments</a></h4>-->
        </div>


    </div>

</body>

</html>