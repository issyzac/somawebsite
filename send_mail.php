<?php
    try{
        $rest_json = file_get_contents("php://input");

        // $qty = 5;
        // $screen = 'black and white';
        // $color = 'red';
        // $phone_number = '+255717138056';

        $rest_json = file_get_contents("php://input");
        $_POST = json_decode($rest_json, true);

        $qty = $_POST['quantity'];
        $screen = $_POST['screen'];
        $color = $_POST['color'];
        $phone_number = $_POST['phone_number'];
        
        $to = "info@somaapps.com";
        $subject = "Somafit Watch Oder";

        $message = "
            <html>
                <head>
                    <title>Somafit Watch Order</title>
                </head>
                <body>
                    <p>Hello there, I would like to order a watch.</p>
                    <br> 
                    
                    <strong style='padding: 0.3em 0;display:inline-block; min-width: 120px;'>Screen: </strong>&nbsp; $screen <br>
                    <strong style='padding: 0.3em 0;display:inline-block; min-width: 120px;'>Color: </strong>&nbsp; $color <br>
                    <strong style='padding: 0.3em 0;display:inline-block; min-width: 120px;'>Qty: </strong>&nbsp; $qty <br>
                    
                    <br>
                    <p>Here's my number: $phone_number</p>
                </body>
            </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <somafit-form@example.com>' . "\r\n";
        // $headers .= 'Cc: myboss@example.com' . "\r\n";
        $headers .= '' . "\r\n";

        mail($to,$subject,$message,$headers);

        echo "success";
    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }
?>