<?
session_start();
require('../library.php');

if(isset($_SESSION['form'])){
	$form = $_SESSION['form'];
}else{
	header('Location: index.php');
	exit();
}

//check.php内の登録ボタンを押したときに発動します。
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$db = dbconnect();
	$stmt = $db->prepare('insert into members (name, email,password, picture) VALUES (?,?,?,?)');
	if(!$stmt){
		die($db->error);
	}
	$password = password_hash($form['password'],PASSWORD_DEFAULT);
	$stmt->bind_param('ssss',$form['name'],$form['email'],$password,$form['image']);
	$success = $stmt->execute();
	if(!$success){
		die($db->error);
	}

	unset($_SESSION['form']);
	header('Location: thanks.php');
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>会員登録</title>

	<link rel="stylesheet" href="../style.css" />
</head>

<body>
	<div id="wrap">
		<div id="head">
			<h1>会員登録</h1>
		</div>

		<div id="content">
			<p>記入した内容を確認して、「登録する」ボタンをクリックしてください</p>
			<form action="" method="post">
				<dl>
					<dt>ニックネーム</dt>
					<dd><? echo h($form['name']); ?></dd>
					<dt>メールアドレス</dt>
					<dd><? echo h($form['email']); ?></dd>
					<dt>パスワード</dt>
					<dd>
						【表示されません】
					</dd>
					<dt>写真など</dt>
					<dd>
							<img src="../member_picture/<? echo h($form['image']); ?>" width="100" alt="" />
					</dd>
				</dl>
				<div><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" value="登録する" /></div>
			</form>
		</div>

	</div>
</body>

</html>