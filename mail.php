<?php

    $to = "webquery@agoracode.community";
    $name = $_POST["user_name"];
    $email = $_POST["email"];
    $text = $_POST["message"];
    $subject = $_POST["subject"];

    $headers =  'MIME-Version: 1.0' . "\r\n";
    $headers .= 'From: '.$name . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $message = "
                   <html>
                        <head>
                           <title>HTML email</title>
                        </head>
                        <body>
                        <br>
                            <p><strong>Name</strong></p>
                            <p>$name</p>
                        <br>
                            <p><strong>Email</strong></p>
                            <p>$email</p>
                        <br>    
                            <p><strong>Query</strong></p>
                            <p>$text</p>
                        </body>
                    </html>
               ";
    mail($to,$subject,$message, $headers);
