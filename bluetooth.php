<?php
// Handle Bluetooth data on the server side

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = json_decode(file_get_contents('php://input'), true);

    // Process the Bluetooth device information as needed
    $deviceInfo = $requestData['deviceInfo'];

    // Perform any additional server-side actions

    // Send a response back to the client
    $response = ['status' => 'success', 'message' => 'Bluetooth device information received'];
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    echo 'Method Not Allowed';
}
?>
