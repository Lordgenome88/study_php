<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <table>
    <? for($i=1; $i<=10; $i++): ?>

      <? if($i % 2 === 1): ?>
        <tr style="background-color:#ccc">
      <? else: ?>
        <tr>
      <? endif; ?>
      <td><? echo $i; ?>行目</td>
      <td>ABC</td>
    </tr>

    <? endfor; ?>
  </table>
</body>
</html>