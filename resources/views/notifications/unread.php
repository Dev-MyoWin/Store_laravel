<?php
$noti = DB::table('notifications')
        ->where('flag', 0)
        ->count();


echo $noti;

 ?>
