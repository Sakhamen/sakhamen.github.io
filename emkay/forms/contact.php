<?php

// Recipient email
$sendTo = "dopestsakhamen@gmail.com";

// $action = $_POST['action'];

    // $name = $_POST['form'][0]['name'];
    // $email = $_POST['form'][0]['email'];
    // $subject = $_POST['form'][0]['subject'];
    // $message = $_POST['form'][0]['message'];

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $landType = $_POST['landType'];
    $address = $_POST['address'];
    $message = $_POST['message'];

    if ($name == "" || $phone == "" || $email == "" || $message == "" || $subject == "" || $landType == "") {
        echo "<p class=\"error\">There was problem while sending E-Mail. Please verify entered data and try again!</p>";
        exit();
    } else {
        // $header = 'From: ' . $name . '<' . $email . ">\r\n" .
        // 'Reply-To: ' . $email . "\r\n" .
        // 'X-Mailer: PHP/' . phpversion();

        // Build email header
        $header = "From: " . $name . "<". $email .">\r\n";

        $subject = "Website Message - ". $_POST['subject'];

        // Send email
        $isSent = mail($sendTo, $subject, $message, $header);

        // if ($isSent) {
        //     echo "<p class=\"success\">Contact form successfully submitted. Thank you, We will get back to you soon!</p>";
        // } else {
        //     echo "<p class=\"error\">There was problem while sending E-Mail. Please email us directly at info@emkayarchitecture.co.za</p>";
        // }

        if (!$isSent) {
            $output = json_encode(array('type' => 'error', 'text' => 'Could not send mail! Please contact administrator.'));
            die($output);
        } else {
            $output = json_encode(array('type' => 'message', 'text' => 'Hi ' . $name . ' Thank you for your email'));
            die($output);
        }

        // echo json_encode(array('returned_val' => 'yoho'));
        echo $output;

        // if ($isSent) {
        //     $response = array(
        //         "status" => "alert-success",
        //         "message" => "We have received your query. Thank you, We will contact you shortly."
        //         );   
        // } else {
        //     $response = array(
        //         "status" => "alert-danger",
        //         "message" => "Message couldn't be sent. Please email us directly at info@emkay.co.za"
        //     );
        // }
    }



?>
