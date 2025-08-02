<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './assets/files/PHPMailer/PHPMailer.php';
require './assets/files/PHPMailer/SMTP.php';
require './assets/files/PHPMailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name   = trim($_POST['name'] ?? '');
    $email  = trim($_POST['email'] ?? '');
    $phone  = trim($_POST['phone'] ?? '');
    $course = trim($_POST['course'] ?? '');
    $city   = trim($_POST['city'] ?? '');

    $errors = [];

    // Basic validation
    if (empty($name)) $errors[] = "Name is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
    if (!preg_match('/^[0-9]{10}$/', $phone)) $errors[] = "Phone number must be 10 digits.";
    if (empty($course)) $errors[] = "Course is required.";
    if (empty($city)) $errors[] = "City is required.";

    if (!empty($errors)) {
        echo "<h3>Form Errors:</h3><ul>";
        foreach ($errors as $e) echo "<li>" . htmlspecialchars($e) . "</li>";
        echo "</ul>";
        exit;
    }

    // Send with PHPMailer
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com'; // 🔁 your SMTP host
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your@email.com';   // 🔁 your email
        $mail->Password   = 'yourpassword';     // 🔁 your password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('your@email.com', 'College Enquiry');
        $mail->addAddress('recipient@email.com'); // 🔁 your receiving address

        $mail->isHTML(true);
        $mail->Subject = "New Application Submission";
        $mail->Body    = "
            <h2>Application Details</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Course:</strong> $course</p>
            <p><strong>City:</strong> $city</p>
        ";

        $mail->send();
        header("Location: thank-you.html");
        exit;
    } catch (Exception $e) {
        echo "<p style='color:red;'>Mailer Error: {$mail->ErrorInfo}</p>";
    }
}
