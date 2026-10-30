<?php
require "connection.php";

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    $delete_query = "DELETE FROM comments WHERE comment_id = '$id'";
    if (mysqli_query($connection, $delete_query)) {
        header("Location: admin.php?msg=deleted");
        exit();
    }
}

$update_data = null;
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    $res = mysqli_query($connection, "SELECT * FROM comments WHERE comment_id = '$id'");
    $update_data = mysqli_fetch_assoc($res);
}

if (isset($_POST['save_update'])) {
    $id = mysqli_real_escape_string($connection, $_POST['comment_id']);
    $text = mysqli_real_escape_string($connection, $_POST['new_text']);
    mysqli_query($connection, "UPDATE comments SET comment_text = '$text' WHERE comment_id = '$id'");
    header("Location: admin.php?status=updated");
    exit();
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

    <title>Admin</title>
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

    <div id="admin-content">

        <?php if ($update_data): ?>
            <div class="form-section">

                <h2>Update Memory</h2>

                <form action="admin.php" method="POST">
                    <input type="hidden" name="comment_id" value="<?php echo $update_data['comment_id']; ?>">
                    <textarea name="new_text" required><?php echo $update_data['comment_text']; ?></textarea>
                    <div class="c-desc">
                        <button type="submit" name="save_update">Save new Memory</button>
                        <a href="admin.php" class="cancel-link">Mind Changed</a>
                    </div>
                </form>
            </div>
        <?php else: ?>

            <div class="scroll">

                <div id="admin_table">
                    <table>
                        <thead>
                            <tr>
                                <th>Comment ID</th>
                                <th>Username</th>
                                <th>Comment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>


                        <tbody> <?php while ($row = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?php echo $row['comment_id']; ?></td>
                                    <td><?php echo $row['user_name']; ?></td>
                                    <td><?php echo $row['comment_text']; ?></td>
                                    <td class="c-desc">
                                        <a href="admin.php?action=edit&id=<?php echo $row['comment_id']; ?>"
                                            class="admin-btn update">Update</a>
                                        <a href="admin.php?action=delete&id=<?php echo $row['comment_id']; ?>"
                                            class="admin-btn delete">Delete</a>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
            </div>
    </div>

        <!--footer-->
        <div id="footer">

            <div id="footer-left">
                <h4 id="about"> About Us </h4>
            </div>

            <div id="footer-right">
                <h4 id="footContactInPHP"> <a href="remarks.php" class="your-button-class">Comments!</a></h4>
            </div>

        </div>

</body>

</html>