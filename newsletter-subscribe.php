<?php
// Newsletter Subscription Handler
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Here you can add code to save email to database or send to email service
        // For now, we'll just redirect back with success message
        
        // Example: Save to file (replace with database in production)
        $file = 'newsletter_subscribers.txt';
        $data = $email . "\n";
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
        
        header('Location: index.php?subscribed=1#newsletter');
        exit;
    } else {
        header('Location: index.php?error=invalid_email#newsletter');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}
?>


