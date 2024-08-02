<?php
// webhook_listener.php

// Log incoming requests for debugging
file_put_contents('webhook.log', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);

// Get the raw POST data
$rawData = file_get_contents('php://input');

// Decode the JSON data into a PHP array
$data = json_decode($rawData, true);

// Check if data was received
if ($data === null) {
    // Respond with a 400 Bad Request if data is not valid JSON
    http_response_code(400);
    echo 'Invalid JSON';
    exit;
}

// Process the webhook data
// For example, log the data to a file
file_put_contents('webhook_data.log', print_r($data, true) . PHP_EOL, FILE_APPEND);

// Respond with a 200 OK status
http_response_code(200);
echo 'Webhook received successfully';
