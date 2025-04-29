<?php
$CompleteName = $CompleteAddress = $EmailAddress = $password = $cpassword = $Section = $Contact = "";
$CompleteNameErr = $CompleteAddressErr = $EmailAddressErr = $passwordErr = $cpasswordErr = $SectionErr = $ContactErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["CompleteName"])){
        $CompleteNameErr = "Complete Name is required";
    } else{
        $CompleteName = $_POST["CompleteName"];
    }

    if(empty($_POST["CompleteAddress"])){
        $CompleteAddressErr = "Complete Address is required";
    } else{
        $CompleteAddress = $_POST["CompleteAddress"];
    }

    if(empty($_POST["EmailAddress"])){
        $EmailAddressErr = "Email Address is required";
    } else{
        $EmailAddress = $_POST["EmailAddress"];
    }

    if(empty($_POST["password"])){
        $passwordErr ="Password is required";
    } else{
        $passwordErr = $_POST["password"];
    }

    if(empty($_POST["cpassword"])){
        $cpasswordErr ="Confirm Password is required";
    } else{
        $cpasswordErr = $_POST["cpassword"];
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

        Name:<input type="text" name="CompleteName" value="<?php echo $CompleteName; ?>"><br>
            <span class="error"><?php echo $CompleteNameErr; ?></span><br>

        Address:<input type="text" name="CompleteAddress" value="<?php echo $CompleteAddress; ?>"><br>
            <span class="error"><?php echo $CompleteAddressErr; ?></span><br>

        EmailAddress:<input type="text" name="EmailAddress" value="<?php echo $EmailAddress; ?>"><br>
            <span class="error"><?php echo $EmailAddressErr; ?></span><br>

        Password:<input type="password" name="password" value="<?php echo $password; ?>"><br>
            <span class="error"><?php echo $passwordErr; ?></span><br>

        Confirm Password:<input type="password" name="cpassword" value="<?php echo $cpassword; ?>"><br>  
            <span class="error"><?php echo $cpasswordErr; ?></span><br>
        
        Section:<input type="text" name="Section" value="<?php echo $Section; ?>"><br>
            <span class="error"><?php echo $SectionErr; ?></span><br>

        Contact:<input type="text" name="Contact" value="<?php echo $Contact; ?>"><br>
            <span class="error"><?php echo $ContactErr; ?></span><br>

        <input type="submit" value="Submit">
    </form>
    <hr>
<?php
    include("class/database.php");
    if($CompleteName && $CompleteAddress && $EmailAddress && $password && $cpassword && $Section && $Contact){
        // echo $CompleteName . "<br>";
        // echo $CompleteAddress . "<br>";
        // echo $EmailAddress . "<br>";
        // echo $Section . "<br>";
        // echo $Contact . "<br>";
        // echo $password . "<br>";
        // echo $cpassword . "<br>";

        $check_email = mysqli_query($connections, "SELECT * FROM mytbl WHERE emailaddress='$EmailAddress'");
        $check_email_row = mysqli_num_rows($check_email);
        if($check_email_row > 0){
            $EmailAddressErr = "Email is already registered";
        } else {

        }

        // $query = mysqli_query($connections, 
        // "INSERT INTO mytbl(name, address, emailaddress, section, contact) 
        // VALUES('$CompleteName', '$CompleteAddress', '$EmailAddress', '$Section ', '$Contact') ");

        // echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
        // echo "<script>window.location.href='index.php';</script>";
    }
        $view_query = mysqli_query($connections, "SELECT * FROM mytbl");
        echo "<table  border='1' width ='50%'>";
        echo"<tr>
                <td>name</td>
                <td>adress</td>
                <td>emailaddress</td>
                <td>section</td>
                <td>contact</td>
                <td>Option</td>
            </tr>";
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
    foreach($names as $name){
        echo $name . "<br>";
    }   
?>