<!-- 数字判定　全角英数字を半角に変換する -->
<?
  $age = '23';
  $age = mb_convert_kana($age, 'n', 'UTF-8');

  if(is_numeric($age)){
    echo $age . '歳です';
  } else {
    echo '*数字で入力してください';
  }
?>