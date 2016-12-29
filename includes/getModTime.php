<?php


date_default_timezone_set('Europe/London');



$filename ='../../../uhen/anita/aware/output/ANITA4/statusPage/hkStatus.json.gz';
//$filename= 'hkStatus.json';
//$file_nameMonitor = '../monitorHk.json';



if (file_exists($filename)) {
    $file_time = new DateTime(date ("Y-m-d H:i:s.", filemtime($filename)));
    //$file_timeMonitor = new DateTime(date ("Y-m-d H:i:s.", filemtime($filenameMonitor)));

    echo 'file time '. $file_time->format('Y-m-d H:i:s');
    $current_time = new DateTime(date('Y-m-d H:i:s'));

    echo 'Current time ' . $current_time->format('Y-m-d H:i:s');
    $diff_time = $file_time->diff($current_time);
    //$diff_timeMonitor = $file_timeMonitor->diff($current_time);
    echo 'Diff time '. $diff_time->format('%a total days') ;


    if($diff_time->H > 0 || $diff_tine->d > 0 || $diff_time->Y > 0 || $diff_time->m >0) {
      echo 'enter first if loop';
      if ($diff_time->i < 3) {
        echo 'sucess';
        echo '<span class="label label-success">' . $file_time->format('Y-m-d H:i:s') . '</span>';
      } else if ($diff_time->i < 10) {
        echo 'warning';
        echo '<span class="label label-warning">' . $file_time->format('Y-m-d H:i:s') . '</span>';
      } else {
        echo 'echo danger';
        echo '<span class="label label-danger">' . $file_time->format('Y-m-d H:i:s') . '</span>';
      }
    } else {
      echo 'outer danger';
      echo '<span class="label label-danger">' . $file_time->format('Y-m-d H:i:s') . '</span>';
    }


} else {
    echo "No Info";
}

echo 'about to clear cache';
clearstatcache();

echo 'cache cleared';
?>
