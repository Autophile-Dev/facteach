<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    $session_data = array(
        'user_email' => $_SESSION['user_email']
    );
    echo json_encode($session_data);
} else {
    echo json_encode(array());
}