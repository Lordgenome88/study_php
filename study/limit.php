<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    li {
      display:block;
      border:solid;
    }
  </style>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
      $(function(){
        $(".dead").sortable();

        $(".dead").sortable({
          connectWith:".dead",
          placeholder: "",
        })


    //sortstart時にその位置を覚えておく
    //親のulを覚えればいい
    //エラーが出たときはその位置に戻す
    $('.dead').on('sortstart',function(){
      //自分の親IDから親ULが導き出せる
      let zibun  = document.getElementById('zibun'); 
      omoidenobasyo = zibun.parentNode;
    })

    $('.dead').on('sortstop',function(){
      //自分の親IDから親ULが導き出せる
      let zibun  = document.getElementById('zibun'); 
      omoidenobasyo.appendChild(zibun);
    })
    var omoidenobasyo;
    //     //mouseoverで一回やばそうなやつに子階層化できなくしておく
    //     $('#mirai').on('mouseover',function(){
    //       let mirai = document.getElementById('mirai');
    //       mirai.classList.remove('dead');
    //       mirai.classList.remove('ui-sortable');
    //       console.log('aa');
    //     })

    // $('.dead').on('mousedown',function(){
    //   console.log('bb');

    //       let mirai = document.getElementById('mirai');
    //       mirai.setAttribute('class','dead');
    //     })
    });
      
</script>

</head>
<body>
  <ul class='dead'>
  <li>あか
      <ul class='dead' >
        <li>red<ul class='dead'>　</ul></li>
        　
      </ul>
  </li>
  <li id="22">あお
    <ul class='dead' id="emp_22">
      <li  id="zibun" dataset-pareid="22">blue<ul class='dead'>　<li>aaaaa</li></ul></li>
      　
    </ul>
  </li>
  　
  </ul>



</body>
</html>