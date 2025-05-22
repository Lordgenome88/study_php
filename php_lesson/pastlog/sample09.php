<?php
  $news = file_get_contents('data/news.txt');
  // echo $news;
  // readfile('data/news.txt');

  //ファイルの追記
  $news = $news . "<br>追加のニュースです";
  $success = file_put_contents('data/news.txt',$news);
  echo $news;
?>