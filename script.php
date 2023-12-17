<?php
//first three lines are troubleshooting code 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//this gets code from my database on localhost
    $mysqli = new mysqli('localhost', 'root', 'root', 'tutorials');
    if($mysqli->connect_errno != 0){
        echo $mysqli->connect_error;
        exit();
    }

    $sql = "SELECT * FROM products";
    $results = $mysqli->query($sql);
    while($product = $results->fetch_assoc()){
        //can enter any category in your phpmyadmin SQL table you like,
        //only set up to enter entire array into data.json
        $products[] = $product;
        
    }
    $file_name = 'data.json';
    $encoded_data = json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    //prints JSON data on screen --can use Google JSON to pretty print this
    print($encoded_data);

    file_put_contents($file_name, $encoded_data);
    
    
?>
