<?php
    $connections = mysqli_connect(
        "localhost",
        "root", 
        "", 
        "myinfo"
    );

        if(mysqli_connect_errno()){
            echo "Peyld to konek to MySQL" .mysqli_connect_error();
        } 
        // else{
        //     echo "konekted.";
        // }
?>