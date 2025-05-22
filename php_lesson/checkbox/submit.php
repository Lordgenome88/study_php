<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>ご予約日</h2>
  <? if(!empty($_REQUEST['reserve'])){ ?>
  <? 
  $reserves = $_REQUEST['reserve']; ?>
  <ul>
    <? foreach($reserves as $reserve): ?>
      <li><? echo htmlspecialchars($reserve, ENT_QUOTES); ?></li>
    <? endforeach; ?>
  </ul>
  <? 
  }else{
    echo "何も選択されていません。";
  }
  ?>
</body>
</html>