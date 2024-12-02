<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $firstName = htmlspecialchars(trim($_POST['first_name']));
    $lastName = htmlspecialchars(trim($_POST['last_name']));
    $country = htmlspecialchars(trim($_POST['country']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $email = htmlspecialchars(trim($_POST['email']));
    $numberOfPersons = intval($_POST['number_of_persons']);

    // Basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address. Please go back and try again.");
    }

    // Save data to a text file (optional - for demo purposes)
    $data = "First Name: $firstName\nLast Name: $lastName\nCountry: $country\nPhone: $phone\nEmail: $email\nNumber of Persons: $numberOfPersons\n---\n";
    file_put_contents("submissions.txt", $data, FILE_APPEND);

    // Display a success message to the user
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Submission Successful</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .message-container {
                margin-top: 100px;
                background-color: #ffffff;
                padding: 20px;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            h1 {
                color: #333;
            }
            a {
                color: #000;
                text-decoration: none;
                font-weight: bold;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class='message-container'>
            <h1>Thank you for contacting us, $firstName!</h1>
            <p>We have received your information and will get back to you soon.</p>
            <p><a href='index.html'>Return to Home</a></p>
        </div>
    </body>
    </html>";
} else {
    // If accessed directly, redirect to the Contact Us page
    header("Location: contact_us.html");
    exit;
}
?>
