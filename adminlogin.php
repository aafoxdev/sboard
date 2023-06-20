<!DOCTYPE HTML>

<html>

<head>
  <title>管理者ログイン</title>

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
  <script type="text/javascript">
    var userId;
    var userPass;
    var infoArray = [];

    function check(){
      
      <?php
        $idpas = file_get_contents("./adminlogin.txt");
        $idpas = str_replace(array("\r\n","\r","\n"), "\n", $idpas);
        $idpas = str_replace("\n", "<diverted>",$idpas);
      ?>

      var src = "<?php echo $idpas; ?>";
      var lines = src.split("<diverted>");     //一行ごとに配列化

      for(var i = 0; i < lines.length; i++){        //一列づつ確認
        var cells = lines[i].split(",");
        console.log(cells[0]);
        console.log(cells[1]);
        if(cells[0] == userId && cells[1] == userPass){
          return 1;
        }
      }
      return 0;
    }


    function login(){
      userId = document.getElementById("myid").value;     //id,passを取得
      userPass = document.getElementById("mypass").value;
      userPass = CybozuLabs.MD5.calc(userPass);          //MD5
      var isok = check();
      if(check()){
        var pas = "./view.php?id="+userId;
        document.location = pas;           // ログイン成功
      }else{
        document.getElementById("error").innerHTML = "※ユーザーIDとパスワードのどちらかが間違えています";  //エラー表示
      }
    }
  </script>
</head>

<body>
  <h2>管理者ログイン<br>
    無断で動作検証OKです</h2>
  <br>
  <p>ユーザーID: admin</p>
  <input type="text" class="textbox" id="myid">
  <p>パスワード: adminpassword</p>
  <input type="password" class="textbox" id="mypass">
  <br><br>
  <input type="button" value="ログイン" class="button" onClick="login();">
  <br>
  <p id="error"></p>
  <br>
  <a href="./index.php" class="hyperhtml">一般ログインページはこちら</a>
</body>

</html>
