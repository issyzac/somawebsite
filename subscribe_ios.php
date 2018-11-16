<?php
    try{
        $rest_json = file_get_contents("php://input");
        $_POST = json_decode($rest_json, true);

        $email = $_POST['email'];
        
        $to = "info@somaapps.com";
        // $to = "wakyj07@gmail.com";
        $subject = "Subscribe on SomaApp for iOS";

        $message = "
            <html>
                <head>
                    <title>Subscribe on SomaApp for iOS</title>
                </head>
                <body>
                    <p>Hello there, I would like to be notified when SomaApp will be available for iOS.</p>
                    
                    <br>
                    <p>Here's my email: $email</p>
                    
                    <br>
                    <p>Regards.</p>
                </body>
            </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <somaapp-form@example.com>' . "\r\n";
        // $headers .= 'Cc: myboss@example.com' . "\r\n";
        $headers .= '' . "\r\n";

        mail($to,$subject,$message,$headers);

        echo "success";
    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }
?>