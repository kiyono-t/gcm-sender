<?php
//プッシュ通知受け取る。１件のみ対応
$fp = fopen("register.txt", "w");
fwrite($fp, $_GET['regId']);
fclose($fp);

print('registration end');