<?php
// Contact Form Handler
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input data
    $name = isset($_POST['name']) ? filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING) : '';
    $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
    $phone = isset($_POST['phone']) ? filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING) : '';
    $subject = isset($_POST['subject']) ? filter_var(trim($_POST['subject']), FILTER_SANITIZE_STRING) : '';
    $message = isset($_POST['message']) ? filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING) : '';
    
    // Validate required fields
    $errors = [];
    
    if (empty($name)) {
        $errors[] = 'Name is required';
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required';
    }
    
    if (empty($subject)) {
        $errors[] = 'Subject is required';
    }
    
    if (empty($message)) {
        $errors[] = 'Message is required';
    }
    
    // If no errors, process the form
    if (empty($errors)) {
        // Here you can add code to:
        // 1. Save to database
        // 2. Send email notification
        // 3. Send auto-reply to user
        
        // Example: Save to file (replace with database in production)
        $file = 'contact_submissions.txt';
        $data = date('Y-m-d H:i:s') . " | " . $name . " | " . $email . " | " . $phone . " | " . $subject . " | " . $message . "\n";
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
        
        // Redirect with success message
        header('Location: contact.php?success=1');
        exit;
    } else {
        // Redirect with error message
        $errorMsg = urlencode(implode(', ', $errors));
        header('Location: contact.php?error=' . $errorMsg);
        exit;
    }
} else {
    header('Location: contact.php');
    exit;
}
?>

