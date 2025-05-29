<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<form action="get.php" name="form">
<input type="hidden" name="ary" value="">

</form>


<ul id="dd">
  <li id="1" data-neww="1" data-pare="0" data-pareid="0">親コンテンツ<ul>
      <li id="9"   name="コンテンツ55" data-neww="0" data-pare="親コンテンツ" data-pareid="1">子コンテンツ1</li>
      <li id="10" name="コンテンツ56" data-neww="0" data-pare="親コンテンツ" data-pareid="1">子コンテンツ2</li>
        <ul>
            <li id="14" name="コンテンツ60" data-neww="0" data-pare="子コンテンツ2" data-pareid="10">子コンテンツ6</li>
        </ul>
      <li id="11" name="コンテンツ57" data-neww="0" data-pare="親コンテンツ" data-pareid="1">子コンテンツ3</li>
      <li id="12" name="コンテンツ58" data-neww="0" data-pare="親コンテンツ" data-pareid="1">子コンテンツ4</li>
      <li id="13" name="コンテンツ59" data-neww="0" data-pare="親コンテンツ" data-pareid="1">子コンテンツ5</li>
    </ul>
  </li>
  <li id="2" name="コンテンツ2" data-neww="1" data-pare="0" data-pareid="0">コンテンツ2<ul>
      <li id="2-1" name="コンテンツ2-1" data-neww="0" data-pare="コンテンツ2" data-pareid="2">コンテンツ2-1</li>
      <li id="2-2" name="コンテンツ2-2" data-neww="0" data-pare="コンテンツ2" data-pareid="2">コンテンツ2-2</li>
      <li id="2-3" name="コンテンツ2-3" data-neww="1" data-pare="コンテンツ2" data-pareid="2">コンテンツ2-3</li>
      <li id="2-4" name="コンテンツ2-4" data-neww="0" data-pare="コンテンツ2" data-pareid="2">コンテンツ2-4</li>
      <li id="2-5" name="コンテンツ2-5" data-neww="0" data-pare="コンテンツ2" data-pareid="2">コンテンツ2-5</li>
    </ul>
  </li>
  <li id="3" name="コンテンツ3" data-neww="1" data-pare="0" data-pareid="0">コンテンツ3<ul>
      <li id="3-1" name="コンテンツ3-1" data-neww="1" data-pare="コンテンツ3" data-pareid="3">コンテンツ3-1</li>
    </ul>
  </li>
</ul>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

var form = document.form;
form.action="get.php";
form.method="post";

var info = {};
var array = [];

var result = $("#dd").find('li');

for(let i = 0; i < result.length; i++){
  info.id       = result[i].id;
  info.name = result[i].firstChild.nodeValue;
  if(result[i].dataset.neww == 1){
    info.neww = 1;
  }else{
    info.neww = 0;
  }
  info.pare = result[i].dataset.pare;
  info.pareid = result[i].dataset.pareid;

  array.push({...info});
}
  var json =  JSON.stringify(array);
  form.ary.value = json;
  form.submit();
</script>

