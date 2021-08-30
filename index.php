<?php 
//phpinfo();
$a = 5;
$b = 10;
$a++;
$j = 1;
echo $b;

echo 'Hello Word!!!';
try {
    $dbh = new PDO('mysql:host=localhost;dbname=my_library', $user = 'test', $pass = 'BQ#j}v!.1jT$f^');
    echo 'conected to DB';
} catch (Exception $e) {
    echo $e;
}


