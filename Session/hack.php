<?php
// The session ID that you want to use
$sessionId = "38294146061%3A98YBziSgbh1gHw%3A4%3AAYcxfxRIa0s0XXe42DKmKc7NrkM4PBQZxIAo5kjiZg";  // Replace with actual PHPSESSID
// URL to make the GET request to
$url = "https://www.instagram.com/"; // Replace with the URL you want to access
// Initialize cURL session
$ch = curl_init();
// Set the URL
curl_setopt($ch, CURLOPT_URL, $url);
// Set the cookie header with the session ID
curl_setopt($ch, CURLOPT_COOKIE, "PHPSESSID=$sessionId");
// Return the response as a string instead of printing it directly
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Execute the GET request and capture the response
$response = curl_exec($ch);
// Check for any errors in the request
if(curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
}
// Close the cURL session
curl_close($ch);
// Output the response (usually HTML or JSON)
echo $response;
?>
