<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <style>
    .round{
      padding:0.5em;
      border:solid 3px #6af;
      border-radius:10px;
    }
    .button{
      color:#fff;
      background-color:#8cf;
      border:solid 1px #6af;
    }
  </style>
</head>
<body>

  <h1 style="text-align:center">掲示板</h1>
  <div style="width:100%;height:150px;overflow:hidden;">
  <div style="width:50%;float:left;">
  <p class="round" style="margin-bottom:0px;width:200px">アカウントID：<?php session_start(); echo $_SESSION['id']; ?></p><br>
  <a href="./index.php" class="round" style="width:200px">ログアウト</a>
  </div>
  <div style="width:50%;float:right;text-align:right;">
  </div>
  </div>

  <div style="text-align:center;margin:auto;width:50%;" class="round">
  <form action="submit.php" method="POST">
    <br><br>
    タイトル　
    <input type="text" name="title" size=20 required>
    <br><br>
    Tag
    <input type="radio" name="tag" value="勉強">勉強
    <input type="radio" name="tag" value="サークル">サークル
    <input type="radio" name="tag" value="行事">行事
    <input type="radio" name="tag" value="その他">その他
    <br>
    <input type="submit" class="button" value="投稿">
    <br><br>
  </form>
  </div>
  <?php
    if(isset($_POST['title'])){
      $thread_id;
      $title = $_POST['title'];
      $pass = $_POST['pass'];

      if(isset($_POST['anonymous'])){
        $userId = "NO_ID";
      }else{
        $userId = $_SESSION['id'];
      }
      $tag = $_POST['tag'];

      $thread_id = file_get_contents("threadcnt.txt");
      $thread_id = (int)$thread_id;
      $thread_id++;
      $thread_id = (string)$thread_id;
      file_put_contents("threadcnt.txt","$thread_id");

      $f = fopen("./thread/thread".$thread_id.".txt", "a");
      fwrite($f, date("y/m/d H:i:s").",$thread_id,$tag,$userId,$title\n");
      fwrite($f, "<TITLE>\n");
      fclose($f);
      header("location: home.php");
    }
  ?>

  <div style="text-align:center;margin:50px auto;"><a href="./home.php" class="round">ホームに戻る</a></div>
</body>
</html>
