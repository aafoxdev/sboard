# 概要
 
“Sboard”は、PHPとメモ帳だけで動作する簡易掲示板システムです。
データベース等は利用していないので、導入も簡単です。
 
# 特徴
 
“Sboard"は、メモ帳でデータを管理しますが、次のような基本的な機能を網羅します。
* ログイン・ログアウト機能
* 新規スレッド作成機能
* 画像ファイル投稿機能
* 記事の検索・ソーティング機能
  
また、管理者ページも導入しており、管理者は一般ユーザーの不適切な投稿を削除する
ことができます。

# 動作検証用ページ
“Sboard"の検証用ページを用意しました。良識の範囲で動作検証を行ってください。<br>
いたずら対策のため、ベーシック認証を採用しています。検証する際は次を入力してください。
* リンク：https://sboard.aafox.net/
* ユーザ名：suser
* パスワード：sboard8931

不適切な利用が見られた場合、検証用サイトは閉鎖させていただきます。予めご了承ください。

# 環境構築
 
“Sboard"は、ApacheとPHPで環境が構築できるため、導入は非常に簡単です。
 
* https://aafox.net/tec/apache.html
* https://aafox.net/tec/sql-php.html

上記のサイトを参考に、動作環境を整えてください。<br>
その後、Apacheの公開用ディレクトリで
次のコマンドを実行すると“Sboard"がダウンロードされます。
```bash
git clone https://github.com/aafoxdev/sboard.git
```
ダウロード後、chmodコマンドを使って、以下のディレクトリとファイルに読み書きの権限を
付与してください。
* threadcnt.txt
* adminlogin.txt
* thread
* upload
 
# 注意
 
本システムにより、発生したいかなる損害に関して、athenaiは一切の責任を負いません。予めご了承ください。
 
# ライセンス
“Sboard"は、MITライセンスに基づいて利用してください。
 
“Sboard" is under [MIT license](https://en.wikipedia.org/wiki/MIT_License).
