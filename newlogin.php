
<!DOCTYPE HTML>
<?php
  if(isset($_GET['name']) && isset($_GET['password'])){
    $fw = fopen("login.txt","a");
    fwrite($fw,$_GET['name'].",".$_GET['password']."\n");
    fclose($fw);
  }
?>
<html>
<head>
<title>新規登録画面</title>
<style>
    .textbox{
      border:solid 1px #6af;
    }
    .button{
      color:#fff;
      background-color:#8cf;
      border:solid 1px #6af;
    }
    .hyperhtml{
      color:#8cf;
    }
    #error{
      color:#f00;
    }
</style>

<script type="text/javascript" src="./md5.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
function registration(){
    var userId;
    var userPass;
    var userPass1;

    userId = document.getElementById("myid").value;
    userPass = document.getElementById("mypass").value;
    userPass1 = document.getElementById("mypass1").value;
    if(userPass != userPass1 || userId == ""){
      document.getElementById("error").innerHTML = "※ユーザーIDが入っていないかパスワードが間違えています";  //エラー表示
      return;
    } 

    userPass = CybozuLabs.MD5.calc(userPass);
    // console.log(userPass);
    document.getElementById("error").innerHTML = "新規登録が完了しました";

    $.get("newlogin.php",{"name":userId,"password":userPass});

    // console.log("OK");
}
</script>
</head>
<body>
<h2>新規登録(完全無料)</h2>
<br>
<p>ユーザー名</p>
<input type="text" class="textbox" id="myid"><br>
<p>パスワード</p>
<input type="password" class="textbox" id="mypass"><br>
<p>パスワード(確認用)</p>
<input type="password" class="textbox" id="mypass1"><br>
<br>
<input type="button" value="新規登録" class="button" onClick="registration()">
<br>
<p id="error"></p>
<br>
<a href="./index.php" class="hyperhtml">ログインメニューに戻る</a>




</body>
</html>
