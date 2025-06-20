<?
session_start();
require('library.php');

if(isset($_SESSION['id']) && isset($_SESSION['name'])){
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
} else {
    header('Location: login.php');
    exit();
}

$db = dbconnect();

//メッセージの投稿
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $message = $_POST['message'];

    $stmt = $db->prepare('insert into posts (message, member_id) values(?,?)');
    if(!$stmt){
        die($db->error);
    }

    $stmt->bind_param('si',$message, $id);
    $success = $stmt->execute();
    if(!$success){
        die($db->error);
    }

    //まっさらなindex.phpに遷移することで再読み込みしても再送信されないようにする
    header('Location: index.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ひとこと掲示板</title>

    <link rel="stylesheet" href="style.css"/>
</head>

<body>
<div id="wrap">
    <div id="head">
        <h1>ひとこと掲示板</h1>
    </div>
    <div id="content">
        <div style="text-align: right"><a href="logout.php">ログアウト</a></div>
        <form action="" method="post">
            <dl>
                <dt><? echo h($name); ?>さん、メッセージをどうぞ</dt>
                <dd>
                    <textarea name="message" cols="50" rows="5"></textarea>
                </dd>
            </dl>
            <div>
                <p>
                    <input type="submit" value="投稿する"/>
                </p>
            </div>
        </form>

        <?
            $stmt = $db->prepare('select p.id,p.member_id,p.message,p.created,m.name,m.picture from posts p,members m where m.id=p.member_id order by id desc');
            if(!$stmt){
                die($db->error);
            }
            $success = $stmt->execute();
            if(!$success){
                die($db->error);
            }

            $stmt->bind_result($id,$member_id,$message,$created,$name,$picture);
            while($stmt->fetch()):
        ?>
        <div class="msg">
            <? if($picture): ?>
                <img src="member_picture/<? echo h($picture); ?>" width="48" height="48" alt=""/>
            <? endif; ?>
            <p><? echo h($message); ?><span class="name">（<? echo h($name); ?>）</span></p>
            <p class="day"><a href="view.php?id=<? echo h($id); ?>"><? echo h($created); ?></a>
            <? if($_SESSION['id'] === $member_id): ?>
                [<a href="delete.php?id=<? echo h($id); ?>" style="color: #F33;">削除</a>]
            <? endif; ?>
            </p>
        </div>
            <? endwhile; ?>
    </div>
</div>
</body>

</html>