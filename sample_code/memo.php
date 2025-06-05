<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>memo</title>
</head>
<body>
  <?
  // まずはデータベースに接続する
  $dsn = "mysql:host=localhost;port=8889;dbname=php_memo;charset=utf8mb4";
  $username = "root";
  $password = "root";
  $options = [];
  $pdo = new PDO($dsn, $username, $password, $options);

  //追加ボタンが押された時の処理を記述する
  if(isset($_POST["create"])){
    if(@$_POST["title"] != "" || @$_POST["contents"] != ""){
      //メモの内容を追加するSQL文を作成し、executeで実行する
      $stmt = $pdo->prepare("INSERT INTO memo(title,contents) VALUE (:title,:contents)");
      //titleとcontentsを紐づけ
      $stmt->bindValue(":title",$_POST["title"]);
      $stmt->bindValue(":contents",$_POST["contents"]);
      //SQL実行
      $stmt->execute();
    }
  }

  //変更ボタンが押された時の処理を記述する
  if(isset($_POST["update"])){
    $stmt = $pdo->prepare("UPDATE memo SET title=:title,contents=:contents WHERE ID=:id");
    $stmt->bindValue(":title",$_POST["title"]);
    $stmt->bindValue(":contents",$_POST["contents"]);
    $stmt->bindValue(":id",$_POST["id"]);
    $stmt->execute();
  }

  //削除ボタンが押された時の処理を記述する
  if(isset($_POST["delete"])){
    $stmt = $pdo->prepare("DELETE FROM memo WHERE ID=:id");
    $stmt->bindValue(":id",$_POST["id"]);
    $stmt->execute();
  }
  ?>

  <!-- メモの新規作成フォーム -->
   新規作成<br>
   <form action="memo.php" method="post">
    Title<br>
    <input type="text" name="title" size="20"></input><br>
    Contents<br>
    <textarea name="contents" style="width:300px; height:100px;"></textarea><br>
    <input type="submit" name="create" value="追加">
   </form>

   <!-- 以下にメモ一覧を追加 -->
   メモ一覧
  <?php
    //memoテーブルからデータを取得
    $stmt = $pdo->query("SELECT * FROM memo");
    //foreachを使ってデータを1つずつ順番に処理していく
    foreach($stmt as $row):
  ?>
    <form action="memo.php" method="post">
      <input type="hidden" name="id" value="<?php echo $row[0] ?>"></input>
      Title<br>
      <input type="text" name="title" size="20" value="<?php echo $row[1] ?>"></input><br>
      Contents<br>
      <textarea name="contents" style="width:300px; height:100px;"><?php echo $row[2] ?></textarea>
      <input type="submit" name="update" value="変更">
      <input type="submit" name="delete" value="削除">
    </form>
  <?php endforeach;  ?>
</body>
</html>