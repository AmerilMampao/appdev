<?php

$emailaddress = $password = "";
$emailaddressErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["emailaddress"])) {
        $emailaddressErr = "Email is required";
    } else {
        $emailaddress = $_POST["emailaddress"];
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
    }

    if ($emailaddress && $password) {
        include("class/database.php");

        $check_email = mysqli_query($connections, "SELECT * FROM mytbl WHERE emailaddress='$emailaddress'");
        $check_email_row = mysqli_num_rows($check_email);

        if ($check_email_row > 0) {
            while ($row = mysqli_fetch_assoc($check_email)) {
                
                $user_id = $row["id"];

                $db_password = $row["password"];
                $db_account_type = $row["account_type"];

                if ($password == $db_password) {

                    session_start();

                    $_SESSION["id"] = $user_id;

                    if ($db_account_type == "1") {
                        echo "<script>window.location.href='admin';</script>";
                    } else {
                        echo "<script>window.location.href='user';</script>";
                    }
                } else {
                    $passwordErr = "Password is incorrect";
                }
            }
        } else {
            $emailaddressErr = "Email Address is not registered";
        }
    }
}

?>

<?php
/* [Keep the PHP logic exactly the same] */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .glass-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        h2 {
            color: #ffffff;
            margin-bottom: 30px;
            font-size: 2em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.8);
        }

        input[type="text"], 
        input[type="password"] {
            width: 87%;
            padding: 12px 20px 12px 40px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 30px;
            color: #ffffff;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: rgba(255, 255, 255, 0.5);
            background: rgba(255, 255, 255, 0.2);
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: linear-gradient(45deg, #7b64ff, #aa4dc8);
            border: none;
            border-radius: 30px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        input[type="submit"]:hover {
            background: linear-gradient(45deg, #6a52ff, #943db3);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .error {
            color: #ff6b6b;
            font-size: 14px;
            margin-top: -15px;
            margin-bottom: 15px;
            text-align: left;
            padding-left: 20px;
            font-weight: 500;
        }

        ::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        @media screen and (max-width: 480px) {
            .glass-container {
                margin: 20px;
                padding: 30px;
            }
            
            h2 {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body>
    <div class="glass-container">
        <h2>Welcome Back</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="text" name="emailaddress" value="<?php echo $emailaddress; ?>" placeholder="Email Address">
            </div>
            <span class="error"><?php echo $emailaddressErr; ?></span>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password">
            </div>
            <span class="error"><?php echo $passwordErr; ?></span>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>