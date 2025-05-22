<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = strip_tags(trim($_POST["name"]));
    $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone   = strip_tags(trim($_POST["phone"]));
    $message = strip_tags(trim($_POST["message"]));

    // Basic validation
    if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Please fill out the form completely and correctly.";
        exit;
    }

    // Email content
    $to = "adrian@legaldocsdirect.co.za"; 
    $subject = "New Contact Form Message";
    $content = "Name: $name\n";
    $content .= "Email: $email\n";
    $content .= "Phone: $phone\n";
    $content .= "Message:\n$message\n";
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $content, $headers)) {
        echo "Thank you for your message!";
    } else {
        http_response_code(500);
        echo "Something went wrong. Please try again.";
    }
} else {
    http_response_code(403);
    echo "Unauthorized request.";
}
