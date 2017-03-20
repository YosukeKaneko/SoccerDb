# SoccerDb
1.ローカルサーバを立てて、/webをルートディレクトリとルートドキュメントに設定して下さい<br>
ex.apacheでバーチャルホスト設定の場合<br>
Listen #port-num<br>
<VirtualHost *:#port-num><br>
   DocumentRoot "/#write-your-directory/soccerDb/web"<br>
   <Directory "/#write-your-directory/soccerDb/web"><br>
        AllowOverride All<br>
   </Directory><br>
</VirtualHost><br>

<br>
2.dbはmysqlを使用しています。下記ファイルがsqlダンプです<br>
soccerdb_2017-03-21.sql

3.下記のファイルでdb名及びユーザー名、パスワードを設定して下さい(分散していて申し訳ございません）<br>
sooccerDb/SoccerDbApplication.php<br>
sooccerDb/web/teams.php<br>
sooccerDb/web/player.php<br>

以上で設定は終了です
