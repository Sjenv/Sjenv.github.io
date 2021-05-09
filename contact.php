<?php
    // DB Connect
    include 'db.php';

    // Contact Form Data 
    $name = $_POST["name"];
    $company_name = $_POST["company-name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $sql = "INSERT INTO contactform(name, company_name, phone, email, message) VALUES('$name', '$company_name', '$phone', '$email', '$message')";
    
    $result = $conn -> query($sql);

    // Mail Config
    $to      = "subhashis.suara999@gmail.com";
    $subject = "Contact Form submission";
    $message = "You have received a new message from the user $name.\n"."Here is the message:\n $message";
    $headers = array(
        'From' => 'webmaster@example.com',
        'Reply-To' => 'webmaster@example.com',
        'X-Mailer' => 'PHP/' . phpversion()
    );

    // $mail_sent = mail($to, $subject, $message, $headers);

    if($result){
        echo "Form submitted successfully!";
        $conn -> close();
    }
    else{
        echo "Error occurred while submitting form";
        echo "Error: {$conn -> error}";
    }

?>