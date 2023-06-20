<?php
  if (!empty($_FILES['upfile']['name']) ){
  $upfile = $_FILES['upfile']['tmp_name'];
  $upfile_name = $_FILES['upfile']['name'];
  echo '画像ファイル'."$upfile_name".'<br>';
  move_uploaded_file($upfile,"upload/$upfile_name");
}
  $id = $_POST['thread_id'];
  $body = $_POST['body'];
  session_start();
  if(isset($_SESSION["id"])){
   $user_Id = $_SESSION["id"];
   echo 'ユーザー：'."$user_Id".'<br>';
  }
  $f = fopen("./thread/thread".$id.".txt", "a");
  fwrite($f, date("y/m/d H:i:s").",$user_Id\n");
  fwrite($f, "$body\n");
  fwrite($f, "<IMG>\n");
  fwrite($f, "$upfile_name\n");
  fwrite($f, "<END>\n");
  fclose($f);
  echo '投稿が完了しました。'.'<br>';
  echo '<a href="thread.php?'.$id.'">スレッドに戻る</a>';
?>