<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recipient email
    $mail_to = "info@mmoinuddin.com";

    // Validate and sanitize user input
    $name = isset($_POST["name"]) ? str_replace(["\r", "\n"], [" ", " "], strip_tags(trim($_POST["name"]))) : '';
    $email = isset($_POST["email"]) ? filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL) : '';
    $phone = isset($_POST["phone"]) ? htmlspecialchars(trim($_POST["phone"])) : '';
    $subject = isset($_POST["subject"]) ? htmlspecialchars(trim($_POST["subject"])) : '';
    $message = isset($_POST["message"]) ? htmlspecialchars(trim($_POST["message"])) : '';

    // Validate required fields
    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) {
        http_response_code(400);
        echo '<p class="alert alert-warning">Please complete the form and try again.</p>';
        exit;
    }

    // Prepare email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Prepare email content
    $content = "<html><body>";
    $content .= "<strong>Name:</strong> $name<br>";
    $content .= "<strong>Email:</strong> $email<br>";
    if (!empty($phone)) {
        $content .= "<strong>Phone:</strong> $phone<br>";
    }
    $content .= "<strong>Message:</strong><br>" . nl2br($message);
    $content .= "</body></html>";

    // Send email
    $mail_sent = mail($mail_to, "Contact Form Submission: $subject", $content, $headers);

    if ($mail_sent) {
        http_response_code(200);
        echo '<p class="alert alert-success">Your message has been sent successfully!</p>';
    } else {
        http_response_code(500);
        echo '<p class="alert alert-warning">Oops! Something went wrong; we couldn\'t send your message.</p>';
    }
} else {
    http_response_code(403);
    echo '<p class="alert alert-warning">There was a problem with your submission, please try again.</p>';
}
