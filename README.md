# SoccerDb
1.ローカルサーバを立てて、/webをルートディレクトリとルートドキュメントに設定して下さい
ex.apacheでバーチャルホスト設定の場合

Listen #port-num
<VirtualHost *:#port-num>
   DocumentRoot "/#write-your-directory/soccerDb/web"
   <Directory "/#write-your-directory/soccerDb/web">
        AllowOverride All
   </Directory>
</VirtualHost>

2.dbはmysqlを使用しています下記のファイルがsqlダンプです
soccerdb_2017-03-21.sql

3.下記のファイルでdb名及びユーザー名、パスワードを設定して下さい(分散していて申し訳ございません）
sooccerDb/SoccerDbApplication.php
sooccerDb/web/teams.php
sooccerDb/web/player.php

以上で設定は終了です
