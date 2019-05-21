<?php

$hash = password_hash('lubiekebaby', PASSWORD_DEFAULT);
// $hash = '$2y$10$YSP3Dx3oL6Hux3MhOeQbg.Fbu';
$pass = 'lubiekebaby';

echo "<br>";
echo $pass;
echo "<br>";
echo $hash;
echo "<br>";
echo "<br>";

if(password_verify($pass, $hash)){
  echo "Dziala";
}
else {
  echo "Gowno";
}

?>