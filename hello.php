<?php 

$command = escapeshellcmd(' python /Users/rushikesh/Sites/hello.py');
$output = shell_exec($command);
echo $output;

?>
