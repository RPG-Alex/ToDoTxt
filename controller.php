<?php
if (isset($_POST['task'])){
  $tasks = file('tasks/task.txt');
  $item = (int)($_POST['task']);
  $DELETE = $tasks[$item];
  $out = array();
  foreach($tasks as $line) {
    if($line != $DELETE) {
      $out[] = $line;
    }
   }
 $fp = fopen("tasks/task.txt", "w+");
 flock($fp, LOCK_EX);
 foreach($out as $line) {
     fwrite($fp, $line);
 }
 flock($fp, LOCK_UN);
 fclose($fp);
} else if (isset($_POST['new-task'])){
  $file = "tasks/task.txt";
  $write=fopen($file,"a");
  $add = $_POST['new-task']."\n";
  fwrite($write,$add);
  fclose($write);
}
 ?>
