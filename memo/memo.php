<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>メモ詳細</title>
</head>
<body>
  <? 
  //メモの詳細を確認する
  require('dbconnect.php'); 
  $stmt = $db->prepare('select * from memos where id=?');
  if(!$stmt) {
    die($db->error);
  }
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
  if(!$id){
    echo '表示するメモを指定してください';
    exit();
  }
  $stmt->bind_param('i',$id);
  $stmt->execute();

  //内容取り出し
  $stmt->bind_result($id,$memo,$created);
  $result = $stmt->fetch();

  if(!$result){
    echo '指定されたメモは見つかりませんでした';
    exit();
  }

  ?>

  <div><pre><? echo htmlspecialchars($memo); ?></pre></div>

  <p><a href="update.php?id=<? echo $id; ?>">編集する</a>| 
  <a href="delete.php?id=<? echo $id; ?>">削除する</a>|
  <a href="/memo">一覧へ</a>
  </p>
</body>
</html>