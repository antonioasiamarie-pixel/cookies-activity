<?php
require "connection.php";

if (isset($_POST['submit_comment'])) {
    $user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
    $comment_text = mysqli_real_escape_string($connection, $_POST['comment']);

    $user_query = "INSERT INTO user_tbl (user_name) VALUES ('$user_name')";
    if (mysqli_query($connection, $user_query)) {
        $new_user_id = mysqli_insert_id($connection);
        $comment_query = "INSERT INTO comments (user_id, comment_text) VALUES ('$new_user_id', '$comment_text')";
        if (mysqli_query($connection, $comment_query)) {
            header("Location: remarks.php?status=success");
            exit();
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
$select = "SELECT comments.comment_id, user_tbl.user_name, comments.comment_text 
               FROM comments 
               INNER JOIN user_tbl ON comments.user_id = user_tbl.user_id
               ORDER BY comments.comment_id DESC";

$query = mysqli_query($connection, $select);
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

    <div class="form-section">
        <h2>Leave a Remark</h2>
        <br>
        <form action="remarks.php" method="POST">
            <div style="margin-bottom: 10px;">
                <label>Your Name:</label>
                <br>
                <input type="text" name="user_name" placeholder="What are you called?" autocomplete="off" required>
            </div>
            <div style="margin-bottom: 10px;">
                <label>Your Comment:</label>
                <br>
                <textarea name="comment" placeholder="Leave a mark and keep it kind." required></textarea>
            </div>
            <button type="submit" name="submit_comment">Leave your memory.</button>
        </form>
    </div>
<div class="scroll">
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Comment</th>
            </tr>
        </thead>


        <tbody> <?php while ($row = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['comment_text']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
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