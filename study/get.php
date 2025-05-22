<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
  //data-parenameはfirstChild.nodeValueのほう使って
  //リスト表示、addChild、並び替え後で親名前データが必要
  $obj = $_REQUEST['ary'];
  $gg = json_decode($obj , true);

  $newID = 0;
  $newparentid = 0;

  //新しく連想配列を作り、名前、旧ID、新IDを入れていく
  $renso = array();
  foreach($gg as $key => $value){
    $newID = $key + 50;
      $name = $gg[$key]['name'];
      $oldID = $gg[$key]['id'];
      array_push($renso,$name);
      array_push($renso,$oldID);
      //新規作成コンテンツの場合、新しいIDは新しいIDを新配列に入れる
      if($gg[$key]['neww'] == 1){
      //IDクリエイト関数呼ぶ
      array_push($renso,$newID);
    }else{
      //新規作成コンテンツじゃない場合、新しいIDは今までのIDを新配列に入れる
      $newid = $gg[$key]['id'];
      array_push($renso,$newid);
    }

    //今更新かけようとしているコンテンツの情報保持
    $orenopare = $gg[$key]['pare'];     //親名前
    $pareid       = $gg[$key]['pareid'];  //親ID
    //次のforeachに移動するためのフラグ
    $b = false;
    $c = false;
      //親コンテンツIDが更新されてないか全てからチェック
      foreach($renso as $key => $value){
        //親の名前が自分の親の名前と一緒だったら次のループに回す(次は親旧ID)(名前被り考慮)
        if($value == $orenopare){
          $b = true;
          continue;
        }

        if($b == true){
          //親の旧IDが自分の親IDと同じなら次のループに回す(親の名前と旧IDが一致＝正真正銘の親)
          if($value == $pareid){
            $c = true;
            $b = false;
            continue;
          }else{
            $b = false;
          }
        }
        if($c == true){
          //newnewidに親の新IDを入れる
          $newparentid = $value;
          $c = false;
          print('<pre>');
          print($value);
          print('</pre>');
          break;
        }
      }
      print('------------------------------');

        //ヒエラルキーインフォインサート関数呼ぶ
        //contentshierarchyins(新しいparentid);
}


  // print_r($renso);

  // foreach($gg as $key => $value){
  //   if($gg[$key]['pare'] == 0){
  //   //第一階層だから親ID更新なし
  //   }else{
  //     //自身の親の名前を覚えておく
  //     $pare = $gg[$key]['pare'];
  //     //最初から最後まで回す
  //     foreach($gg as $key => $value){
  //       // 自分の親の名前が来たとき
  //       if($pare ==$gg[$key]['name']){
  //         //親のIDをparentIDに入れる こいつを使ってヒエラルキー登録
  //         $pareID = $gg[$key]['id'];
  //         break;
  //       }
  //     }
  //   }
  // }
?>



<!-- 配列で覚えておくパターン -->
<!-- <?php

  $obj = $_REQUEST['ary'];
  $gg = json_decode($obj , true);
  $num = 0;
  $newID = 22;
  $renso = array();

  foreach($gg as $key => $value){
    //新規作成フラグが立ってる奴は別連想配列にID保存
    if($gg[$key]['neww'] == 1){
      $num = $gg[$key]['name'] + $gg[$key]['id'];
      $renso[$num] = $gg[$key]['id'];
      //新しいコンテンツID作成

      $renso[$key];

      // $renso = $renso +  array($key => $gg[$key]['id']);
      // $renso = $renso +  array($key => '222');

      // array_push($renso,'newID');

      // array_push($renso,$gg[$key]['id']);
    }
  }

  print('<pre>');
  print_r($renso);
  print('</pre>');


?> -->
</body>
</html>