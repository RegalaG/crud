<?php
// Edit record here...
 
require("connect.php");
 
$user_id = $_REQUEST["user_id"];
$query = "SELECT * FROM user WHERE user_id = '".$user_id."' ";
 
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
 
?>
 
<html>
 
<head>
    <title>Update User</title>
</head>
 
<body>
    <h1>Update User</h1>
 
    <?php
    $msg = "";
 
    if(isset($_POST['new']) && $_POST['new'] == 1) {
        $user_id = $_REQUEST["user_id"];
        $user_name = $_REQUEST["user_name"];
 
 
        $update = "UPDATE `user` SET
        `user_name` = '$user_name' WHERE `user_id` = '".
        $user_id."'";
        mysqli_query($connection, $update);
        $msg = "Record was successfully updated!";
        } else {
           
       
    ?>
   
    <form action="" method="post">
        <input type="hidden" name="new" value="1">
        <input type="hidden" name="user_id" value="<?php
        echo $row['user_id']; ?>"> <br>
        <input type="text" name="user_name" value="<?php
        echo $row['user_name']; ?>" required> <br>
        <input type="email" name="user_email" value="" required> <br>
        <input type="password" name="user_password" value="" required> <br>
        <input type="submit" value="Update Record">
    </form>
   
    <?php } ?>
 
<p style="color:blue;"><?php echo $msg; ?></p>
</body>
 
</html>