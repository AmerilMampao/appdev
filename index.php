<?php

include("class/database.php");

$name = $Address = $emailaddress = $password = $cpassword = $Section = $Contact = "";
$nameErr = $AddressErr = $emailaddressErr = $passwordErr = $cpasswordErr = $SectionErr = $ContactErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["name"])){
        $nameErr = "Name is required";
    } else{
        $name = $_POST["name"];
    }

    if(empty($_POST["Address"])){
        $AddressErr = "Address is required";
    } else{
        $Address = $_POST["Address"];
    }

    if(empty($_POST["emailaddress"])){
        $emailaddressErr = "Email Address is required";
    } else{
        $emailaddress = $_POST["emailaddress"];
    }

    if(empty($_POST["Section"])){
        $SectionErr = "Section is required";
    } else{
        $Section = $_POST["Section"];
    }

    if(empty($_POST["Contact"])){
        $ContactErr = "Contact is required";
    } else{
        $Contact = $_POST["Contact"];
    }

    if(empty($_POST["password"])){
        $passwordErr ="Password is required";
    } else{
        $password = $_POST["password"];
    }

    if(empty($_POST["cpassword"])){
        $cpasswordErr ="Confirm Password is required";
    } else{
        $cpassword = $_POST["cpassword"];
    }

    if ($name && $Address && $emailaddress && $Section && $Contact && $password && $cpassword) {
        $check_email = mysqli_query($connections, "SELECT * FROM mytbl WHERE emailaddress='$emailaddress'");
        $check_email_row = mysqli_num_rows($check_email);
    
        if ($check_email_row > 0) {
            $emailaddressErr = "Email is already registered";
        } else {
            $query = mysqli_query($connections, "INSERT INTO mytbl(name, address, emailaddress, section, contact, password, account_type)
            VALUES('$name','$Address','$emailaddress','$Section', '$Contact','$cpassword', 2)");
    
            if ($query) {
                echo "<script>alert('New Record has been inserted!');</script>";
                echo "<script>window.location.href='index.php';</script>";
            } else {
                echo "Error: " . mysqli_error($connections);
            }
        }
    }
    
}
?>
    <style>
        .error{
            color: red;
        }
    </style>

    <br>
    <?php include("includes/nav.php")?>

    <br>
    <br>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <label>Name:<input type="text" name="name" value="<?php echo $name; ?>"><br>
            <span class="error"><?php echo $nameErr; ?></span><br></label>

        <label>Address:<input type="text" name="Address" value="<?php echo $Address; ?>"><br>
            <span class="error"><?php echo $AddressErr; ?></span><br></label>

        <label>EmailAddress:<input type="text" name="emailaddress" value="<?php echo $emailaddress; ?>"><br>
            <span class="error"><?php echo $emailaddressErr; ?></span><br></label>
        
        <label>Section:<input type="text" name="Section" value="<?php echo $Section; ?>"><br>
            <span class="error"><?php echo $SectionErr; ?></span><br></label>

        <label>Contact:<input type="text" name="Contact" value="<?php echo $Contact; ?>"><br>
            <span class="error"><?php echo $ContactErr; ?></span><br></label>

        <label>Password:<input type="password" name="password" value="<?php echo $password; ?>"><br>
            <span class="error"><?php echo $passwordErr; ?></span><br></label>

       <label>Confirm Password:<input type="password" name="cpassword" value="<?php echo $cpassword; ?>"><br>  
            <span class="error"><?php echo $cpasswordErr; ?></span><br></label>

        <input type="submit" value="Submit">

    </form>
    <hr>
<?php
        // $query = mysqli_query($connections, "INSERT INTO mytbl(name, address, emailaddress, section, contact) VALUES('$name', '$Address', '$emailaddress', '$Section ', '$Contact') ");
        
        // echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
        // echo "<script>window.location.href='index.php';</script>";

        echo "<table  border='1' width ='50%'>";
        echo"<tr>
                <td>Name</td>
                <td>Address</td>
                <td>Email Address</td>
                <td>Section</td>
                <td>Contact</td>
                <td>Option</td>
            </tr>";
        $view_query = mysqli_query($connections, "SELECT * FROM mytbl");

        while($row = mysqli_fetch_assoc($view_query)){
            $user_id = $row["id"];
            $db_name = $row["name"];
            $db_address = $row["address"];
            $db_email = $row["emailaddress"];
            $db_section = $row["section"];
            $db_contact = $row["contact"];

            // echo $db_name. "<br>";
            // echo $db_address. "<br>";
            // echo $db_email. "<br>";
            // echo $db_section. "<br>";
            // echo $db_contact. "<br>";

            echo "<tr>
                    <td>$db_name</td>
                    <td>$db_address</td>
                    <td>$db_email</td>
                    <td>$db_section</td>    
                    <td>$db_contact</td>
                    <td>
                    <a href='edit.php?id=$user_id'>Update</a>
                    <a href='ConfirmDelete.php?id=$user_id'>Delete</a>
                    </td>

                </tr>";
        }

        echo "</table>"
?>
<hr>
<?php
    $Paul = "Paul";
    $Mica = "Mica";     
    $Kaye = "Kaye";

    $names = array($Paul, $Mica, $Kaye);

    foreach($names as $display_name){
        echo $display_name . "<br>";
    }   
?>