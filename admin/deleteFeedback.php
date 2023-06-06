<?php
require_once('../classes/feedback.php');

// make sure the product id is present
if(isset($_GET['userId'])){
    $userId = $_GET['userId'];
    $feedback = new Entry();
    $feedback->delete($userId);
}

// redirect back to admin dashboard
header('Location: feedbacks.php');
?>
