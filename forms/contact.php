<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set the recipient email address
    $to = "lilsnowflare@gmail.com";

    // Get the form fields
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Compose the email message
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "You have received a new message from the contact form on your website.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n";
    $email_body .= "Message:\n$message\n";

    // Set headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Attempt to send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Email sent successfully
        echo "Thank you! Your message has been sent successfully.";
    } else {
        // Failed to send email
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // Not a POST request, redirect or handle error
    echo "Invalid request method.";
}
?>
