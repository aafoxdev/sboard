<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>スレッド</title>
<style>
.round{
padding:0.5em;
border:solid 3px #6af;
border-radius:10px;
}
</style>
</head>

<body>

<?php
  session_start();
  if(isset($_GET["id"])){
    $_SESSION["id"] = $_GET["id"];
    $_SESSION["isAdmin"] = 1;
  }
?>

<h1 style="text-align:center">掲示板
<?php
  if($_SESSION["isAdmin"] == 1){
    echo "(管理者)";
  }
?> 
</h1>
<div style="width:100%;height:150px;overflow:hidden;">
<div style="width:50%;float:left;">
<p class="round" style="margin-bottom:0px;width:200px">アカウントID：<?php echo $_SESSION['id']; ?></p><br>
<a href="./index.php" class="round" style="width:200px">ログアウト</a>
</div>
<div style="width:50%;float:right;text-align:right;">
キーワード検索<br>
<form action="SearchName.php" method="POST">
  <input type="text" name="searchword" size=20>
  <input type="submit" value="" style="width:25px;height:25px;background:url(./glass.png) left top no-repeat;">
</form>
</div>
</div>

<div class="round" style="text-align:center;width:75%;margin:auto;">
スレッド一覧
<br>
<form action="view.php" method="POST">
<input type="radio" name="sort" value="new">新しい順
<input type="radio" name="sort" value="old">古い順
<input type="submit">
</form><br>
<?php
if($_SESSION["isAdmin"] == 1){
    echo '<form action="delete.php" method="POST">';
    echo '<input type="text" name="delete_id" value="">';
    echo '<input type="submit" value="削除">';
    echo '</form>';
}
$sort = $_POST['sort'];
$cn = file_get_contents("threadcnt.txt");
if(!$sort){
$sort = 'old';
}
if($sort=='new'){
for ($cnt = $cn; 0 < $cnt; $cnt--){
    $f = file_get_contents("thread/thread".$cnt.".txt");
    if($f){
      $item = explode("\n<TITLE>\n", $f);
      $i = 0;
      list($time, $num, $tag, $ID, $title) = explode(',', $item[$i]);
      $title=htmlspecialchars($title);
      echo '<font color="#008000"><b>'.($cnt).": $time $tag $ID <a href='./thread.php?".$cnt."'>$title</a></b></font>".'<br>';
     }
  }
}else{
for ($cnt = 1; $cnt <= $cn; $cnt++){
   $f = file_get_contents("thread/thread".$cnt.".txt");
   if($f){
    $item = explode("\n<TITLE>\n", $f);
    $i = 0;
    list($time, $num, $tag, $ID, $title) = explode(',', $item[$i]);
    $title=htmlspecialchars($title);
    echo '<font color="#008000"><b>'.($cnt).": $time $tag $ID <a href='./thread.php?".$cnt."'>$title</a></b></font>".'<br>';
    }
 }
}

?>
<br><br>
</div>

</body>
</html>
