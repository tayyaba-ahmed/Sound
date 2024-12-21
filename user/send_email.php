<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill in all required fields.";
        exit;
    }

    $to = "tayyabaahmed777@gmail.com"; 
    $emailSubject = "New Contact Form Submission: " . $subject;
    $emailBody = "
        <h1>Contact Form Submission</h1>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Subject:</strong> {$subject}</p>
        <p><strong>Message:</strong><br>{$message}</p>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: {$email}" . "\r\n";
    
    if (mail($to, $emailSubject, $emailBody, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Failed to send the email. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
