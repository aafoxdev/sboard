<?php
  $delete_id = $_POST['delete_id'];
  if(unlink("./thread/thread".$delete_id.".txt")){
    echo "ファイルの削除が完了しました。";
  }else{
    echo "ファイルの削除に失敗しました。";
  }
  echo '<a href="view.php">ホーム画面に戻る</a>';
?>