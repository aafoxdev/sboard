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
</h3>

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
<h3>スレッド一覧</h3>
<br><br>

<?php
$num=file_get_contents("threadcnt.txt"); //nummberにはスレッド数が入ります
$search = $_POST['searchword']; //検索したい語句を受け取りまっす
$hit = 0;


for($i=0;$i<$num;$i++){
        $str = file_get_contents("thread/thread".($i+1).".txt");
        list($header,$body) = explode("\n<TITLE>\n",$str);
        list($time,$figure,$tag,$ID,$title) = explode(',',$header);
        if(strstr($title, $search)){
         $title=htmlspecialchars($title);
         echo '<font color="#008000"><b>'.($i+1).": $time $tag $ID <a href='./thread.php?".($i+1)."'>$title</a></b></font>".'<br>';
         $hit++;
       }
}


if($hit == 0){
	      echo "<b>ヒットするものはありませんでした</b>";
}

echo '<br><br>';
if($_SESSION["isAdmin"] == 1){
  echo '</div><br><br><div align="center"><a href="view.php">ホーム画面に戻る</a><div>';
}else{
  echo '</div><br><br><div align="center"><a href="home.php">ホーム画面に戻る</a><div>';
}
?>

</body>
</html>
