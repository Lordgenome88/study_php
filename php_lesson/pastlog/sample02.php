<?php
  date_default_timezone_set('Asia/Tokyo');
  echo date('G時 i分 s秒');
  $today = new DateTime();
  echo '現在は、' . $today->format('G時 i分 s秒') . ' です';
?>