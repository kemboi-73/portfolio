<?php
// Check if form data is sent using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate and sanitize inputs (for basic example, add more validation as needed)
    $fullname = htmlspecialchars($fullname);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($message);

    // Compose email content
    $to = 'kemboimikey@gmail.com';
    $subject = 'New Message from Contact Form';
    $body = "Full Name: $fullname\nEmail: $email\n\nMessage:\n$message";

    // Set headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo 'success'; // Or redirect to a success page
    } else {
        echo 'error'; // Or redirect to an error page
    }
}
?>
