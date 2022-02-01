<?php

include_once "dbh.inc.php";
$connect = new PDO("mysql:host=localhost;dbname=test2", "root", "");

    if(isset($_POST["rating_data"]))
    {
        $a = $_POST["user_name"];
        $data = array(
            ':user_name'		=>	$_POST["user_name"],
            ':product_id'		=>	$_POST["product_id"],
            ':user_rating'		=>	$_POST["rating_data"],
            ':user_review'		=>	$_POST["user_review"],
            ':datetime'			=>	time()
        );

        $query = "
        INSERT INTO review_table 
        (user_name, product_id, user_rating, user_review, datetime) 
        VALUES (:user_name, :product_id, :user_rating, :user_review, :datetime)
        ";

        $statement = $connect->prepare($query);

        $statement->execute($data);

        echo "Your Review & Rating Successfully Submitted $a";

    }
    else{
        echo "Error";
    }

