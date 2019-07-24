<?php
$destination_name_ulaw = '/var/www/html/pyphp/audio/uploads/encoded.wav';

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($destination_name_ulaw));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($destination_name_ulaw));
ob_clean();
flush();
readfile($destination_name_ulaw);
exit();

?>

