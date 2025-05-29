<!-- メモ帳 -->

<?
//DB接続
require('dbconnect.php');

//最大ページ数を求める
$counts = $db->query('select count(*) as cnt from memos');
$count = $counts->fetch_assoc();
$max_page = floor(($count['cnt'] + 1 ) / 5 + 1 );

$stmt = $db->prepare('select * from memos order by id desc limit ?, 5');
if(!$stmt){
  die($db->error);
}
$page = filter_input(INPUT_GET,'page',FILTER_SANITIZE_NUMBER_INT);
$page = ($page ?: 1);
$start = ($page - 1) * 5;
$stmt->bind_param('i',$start);
$result = $stmt->execute();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>メモ帳</title>
</head>
<body>
  <h1>メモ帳</h1>
  <p>→<a href="input.html">新しいメモ</a></p>

  <?
    $stmt->bind_result($id, $memo, $created);
    $count = 0;
  ?>
  <? while($stmt->fetch()){ ?>
    <div>
      <h2><a href="memo.php?id=<? echo $id; ?>"><? echo htmlspecialchars(mb_substr($memo,0,50)) ?></a></h2>
      <time><? echo htmlspecialchars($created) ?></time>
    </div>
    <? $count+=1; ?>
  <? } ?>
  <? if($count == 0){ ?>
    <p>表示するメモがありません</p>
  <? } ?>
  <?if($page > 1) {?>
  <a href="?page=<? echo $page-1; ?>"><? echo $page-1; ?>ページ目へ</a> |
  <? } ?>
  <? if($page < $max_page){ ?>
    <a href="?page=<? echo $page+1; ?>"><? echo $page+1; ?>ページ目へ</a>
  <? } ?>
</body>
</html>