<?php
date_default_timezone_set('Asia/Tokyo');
$sum = 100 + 150;
echo  $sum . '<br>';

while($sum < 380):
  $sum = $sum + 20;
  echo $sum . '<br>';
endwhile;
?>

<?php
$day = date('n/j(D)');
echo $day . '<br>';
?>