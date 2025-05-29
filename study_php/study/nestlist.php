<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nest List</title>
</head>

<body>


  <?php
  $data = 2;
  $contentsBIG = 'BIGcontents' . '<br>';
  $nestdata = 3;
  $contentsSMALL = 'SMALLcontents' . '<br>';
  ?>

  <?php
  for ($i = 0; $i <  $data; $i++) {
  ?>
    <table>
      <tr>
        <?php echo $contentsBIG; ?>
      <tr>
        <?php
        for ($m = 0; $m < $nestdata; $m++) {
        ?>
            <?php
            echo '|______' . $contentsSMALL; ?>
          <?php
        }
          ?>
      </tr>

      </tr>
    </table>
  <?php
  }
  ?>


</body>

</html>