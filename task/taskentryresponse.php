<?php
// insert_task.php

    // Assuming you have set up the database connection in "conn.php"

    // Get form data
    $heading = $_POST["heading"];
    $details = $_POST["details"];
    $assignedDate = $_POST["assignedDate"];
    $assignedTo = $_POST["assignedTo"];
    $expCompletionDate = $_POST["expCompletionDate"];
    include "../Home/database/conn.php";

    // Prepare and execute the query
    $stmt = $con->prepare("INSERT INTO tasks (heading, detail, assigned_date, assigned_to, exp_comp_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $heading, $details, $assignedDate, $assignedTo, $expCompletionDate);

    if ($stmt->execute()) {
        
        $qry = "SELECT Email FROM `login` where `ID` =$assignedTo";
        $result = mysqli_query($con,$qry);
        while($row = mysqli_fetch_assoc($result))
        {
            $mail = $row['Email'];
          // Email content
    $subject = "New Task Created: $heading";
    $message = "<html><body>";
    $message .= "<h2>Task Details:</h2>";
    $message .= "<p><strong>Heading:</strong> $heading</p>";
    $message .= "<p><strong>Details of The Task:</strong><br>$details</p>";
    $message .= "<p><strong>Assignment Date:</strong> $assignedDate</p>";
    $message .= "<p><strong>Assigned To:</strong> $assignedTo</p>";
    $message .= "<p><strong>Expected Completion Date:</strong> $expCompletionDate</p>";
    $message .= "</body></html>";

    // Set content type for HTML email
    $headers = $mail; // Replace with your own email address
    $headers .= "\r\nContent-Type: text/html; charset=UTF-8\r\n";

    // Send the email
    if (mail($email, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email. Please check your mail configuration.";
    }
        }

    } else {
        echo "Error inserting task: " . $con->error;

    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $con->close();

?>
