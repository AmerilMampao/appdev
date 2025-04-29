<?php
    $user_id = $_REQUEST["id"];
        include("class/database.php");    
        $get_record = mysqli_query($connections, "SELECT * FROM mytbl WHERE id='$user_id'");
        while($row_edit = mysqli_fetch_assoc($get_record)){
            $db_name = $row_edit["name"];
            $db_address = $row_edit["adress"];
            $db_email = $row_edit["emailaddress"];
            $db_section = $row_edit["section"];
            $db_contact = $row_edit["contact"];
        }
?>
<form method="POST" action="Update_Record.php">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    
    <input type="text" name="new_Name" value="<?php echo $db_name?>">
    <br>
    <input type="text" name="new_Adress" value="<?php echo $db_address?>">
    <br>
    <input type="text" name="new_Email" value="<?php echo $db_email?>">
    <br>
    <input type="text" name="new_Section" value="<?php echo $db_section?>">
    <br>
    <input type="text" name="new_Contact" value="<?php echo $db_contact?>">
    <br>
 
    <input type="submit" value="Update">
 
</form>