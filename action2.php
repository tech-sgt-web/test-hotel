<?php
if(isset($_POST['register']))
{
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $children = $_POST['Arrival_time'];
    $children = $_POST['Need_airport_pickup'];
    $message = $_POST['message'];

    // Insert data into the database
    $con = mysqli_connect("localhost","classic_db","Chandu@12345","sgtuniversityac_classichotel");
    $query = "INSERT INTO booking (email, name, phone, checkin_date, checkout_date, adults, children, Arrival_time, Need_airport_pickup, message) 
              VALUES ('$email', '$name', '$phone', '$checkin_date', '$checkout_date', '$adults', '$children', '$Arrival_time' '$Need_airport_pickup' '$message')";
    $result = mysqli_query($con, $query);

    if($result)
    {
        echo "Thank you for filling the form! We will reach out to you soon.";

        // Generate and send email
        $to = "chandrabhan_dmarketing@sgtuniversity.org"; // Update with your email address
        $subject = "New Booking Form Submission";
        $email_message = "A new booking form has been submitted:\n\n";
        $email_message .= "Name: $name\n";
        $email_message .= "Email: $email\n";
        $email_message .= "Phone: $phone\n";
        $email_message .= "Check-in Date: $checkin_date\n";
        $email_message .= "Check-out Date: $checkout_date\n";
        $email_message .= "Adults: $adults\n";
        $email_message .= "Children: $children\n";
        $email_message .= "Arrival_time: $Arrival_time\n";
        $email_message .= "Need_airport_pickup: $Need_airport_pickup\n";
        $email_message .= "Message: $message\n";

        // Use PHPMailer library to send emails
        require './PHPMailer/src/PHPMailer.php';
        require './PHPMailer/src/SMTP.php';
        require './PHPMailer/src/Exception.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->setFrom('sales@classichotelsindia.com', 'Classic Hotels');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $email_message;

        if($mail->send()) {
            echo "An email notification has been sent to the administrator.";
        } else {
            echo "An error occurred while sending the email.";
        }
    }
    else
    {
        echo "Insertion Failed";
    }
}
?>
