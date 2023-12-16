

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    $mysqli = new mysqli('localhost', 'root', '', 'tutorials');
    if($mysqli->connect_errno != 0){
        echo $mysqli->connect_error;
        exit();
    }

    $sql = "SELECT * FROM products";
    $results = $mysqli->query($sql);
    while($product = $results->fetch_assoc()){
        //can enter any category in your phpmyadmin SQL table you like
        $products[] = $product;
        
    }
    $file_name = 'data.json';
    $encoded_data = json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    //prints JSON data on screen --can use Google JSON to pretty print this
    print($encoded_data);


    //currently will NOT build the data.json file from phpmyadmin after being called. 
    //WIP: prob has more to do with XAMMP server settings 
    //file_put_contents($file_name, $encoded_data);
    
    
?>
