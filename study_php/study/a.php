<?php

    $fp = fopen("aa.php","r");

    # 整数の入力
    fscanf($fp, "%d", $a);
    # スペース区切りの整数の入力
    fscanf($fp, "%d %d", $b, $c);
    # 文字列の入力
    fscanf($fp, "%s", $s);
    # 出力
    var_dump($fp);
    // echo ($a+$b+$c)." ".$s."\n";
    ?>