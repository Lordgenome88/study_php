<?
//DB接続
require('dbconnect.php');
//クエリ準備
$stmt = $db->prepare('insert into memos(memo) values(?)');
//クエリエラーチェック
if(!$stmt){
  die($db->error);
}

//無害化したPOSTメッセージを代入
$memo = filter_input(INPUT_POST,'memo',FILTER_SANITIZE_SPECIAL_CHARS);
//クエリにPOSTメッセージ紐づけ
$stmt->bind_param('s',$memo);
//SQL実行
$ret = $stmt->execute();
//SQLエラーチェック
if($ret){
  echo '登録されました';
  echo '<br>→<a href="index.php">トップへ戻る</a>';
}else{
  $db->error;
}

?>