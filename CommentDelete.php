<?php
$NUM = $_POST['number'];
$lf = file_get_contents("./thread/thread".$NUM.".txt");
$item = explode("\n<END>\n", $lf);
$num = $_POST['delete_number'];
$fp = fopen("thread/thread".$NUM.".txt", "w");
if($fp){
$lf = str_replace($item[$num-1]."\n<END>\n", "", $lf);
fputs($fp,$lf);
fclose($fp);
echo "削除しました".'<br>';
}else{
 echo "エラーが発生しました".'<br>';
}
echo '<a href="./thread.php?'.$NUM.'">スレッドに戻る</a>';
?>
