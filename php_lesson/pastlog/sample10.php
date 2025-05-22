<!-- xmlの読み込み -->
<?php  $xmlTree = simplexml_load_file('rss.xml'); ?>

<?php
  foreach($xmlTree->channel->item as $item){
?>
<!-- 
リンク先を、xml内のitem->linkに指定
文字自体はitem->title 
-->
・<a href="<?php echo $item->link; ?>"><?php echo $item->title; ?><a><br>

<?php
  }
?>