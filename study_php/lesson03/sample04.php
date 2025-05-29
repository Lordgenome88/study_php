<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sample04</title>
</head>
<body>
  <?
  $db = new mysqli('localhost:8889','root','root','mydb');

  $message = "Foamからのメモです";
  $stmt = $db->prepare('insert into memos(memo) values(?)');
  if(!$stmt){
    die($db->error);
    echo 'こっちのエラー';
  }
  $stmt->bind_param('s', $message);
  $ret = $stmt->execute();
  if($ret){
    echo 'データを挿入しました';
  }else{
    echo $db->error;
    echo 'あっちのエラー';
  }
  ?>
</body>
</html>