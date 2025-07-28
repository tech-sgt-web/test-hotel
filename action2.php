<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require './PHPMailer/src/Exception.php';

if (isset($_POST['register'])) {
    $email         = $_POST['email'] ?? '';
    $name          = $_POST['name'] ?? '';
    $phone         = $_POST['phone'] ?? '';
    $room_type     = $_POST['room_type'] ?? '';
    $checkin_date  = $_POST['checkin_date'] ?? '';
    $checkout_date = $_POST['checkout_date'] ?? '';
    $adults        = $_POST['adults'] ?? 0;
    $children      = $_POST['children'] ?? 0;
    $arrival_time  = $_POST['arrival_time'] ?? '';
    $message       = $_POST['message'] ?? '';

    $conn = new mysqli("localhost", "root", "", "classic_db");
    if ($conn->connect_error) {
        die("Database Connection Failed: " . $conn->connect_error);
    }

    $query = "INSERT INTO reservations (email, name, phone, room_type, checkin_date, checkout_date, adults, children, arrival_time, message)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssiiis", $email, $name, $phone, $room_type, $checkin_date, $checkout_date, $adults, $children, $arrival_time, $message);

    if ($stmt->execute()) {
        // Send Email
        $to = "chandrabhan_dmarketing@sgtuniversity.org";
        $subject = "New Hotel Reservation";
        $body = "A new reservation has been submitted:\n\n";
        $body .= "Name: $name\nEmail: $email\nPhone: $phone\nRoom Type: $room_type\n";
        $body .= "Check-in: $checkin_date\nCheck-out: $checkout_date\nAdults: $adults\nChildren: $children\n";
        $body .= "Arrival Time: $arrival_time\nMessage: $message";

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'chandu.gautam.13@gmail.com'; // Your email
        $mail->Password = 'ttyiedvrlwalamuq'; // Your app password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('sales@classichotelsindia.com', 'Classic Hotels');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->send(); // no need to check here, even if it fails

        // ✅ Redirect to Thank You Page
        header("Location: thank-you.html");
        exit();
    } else {
        echo "❌ Error inserting data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
