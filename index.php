<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
include_once "controller.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>File Based To-Do</title>

    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body>
<div class="mt-5"></div>
<div class="jumbotron">
  <h1 class="display-4 text-center">Get Things Done!</h1>
  <form action="index.php" method="post" class="text-center">
  <input type="hidden" name="number" id="number" value="">
  <input type="text" name="new-task" id="task" required="required" placeholder="What needs to be done?" class="form-control input-sm"/>
  <input type="submit" name="submit" style="visibility: hidden; position: absolute;" />
  </form>
  <hr>

<?php
$file=file('tasks/task.txt');
foreach ($file as $line_num => $line) {
  echo '<form action="" id="'.$line_num.'" method="post">
    <input type="radio"  value="'.$line_num.'" name="task"> '.$line.'</form>';
};

?>
<hr>
<h1 class="display-4 text-center">About Me:</h1>
<p>This is a simple application I made to help myself understand how to use PHP to work with text files for reading and writing. The end goal is to eventually make a simple CMS that enterprises can use to maintain and update a website, intended for mostly static, informational websites that may occasionally need update. Eliminating the need to contact a developer to simply update some text, while also avoiding all the extra backend resources generally associated with a CMS (API connections, Databases, etc.)</p>
<p>Please feel free to play around with it! </p>
</div>
<script type="text/javascript">
  <?php
foreach ($file as $num => $value) {
  echo "window.addEventListener(\"DOMContentLoaded\", function () {
    var ".'a'.$num." = document.getElementById(\"".$num."\");
     ".'a'.$num.".method='post';
      document.getElementById(\"".$num."\").addEventListener(\"click\", function () {
        ".'a'.$num.".submit();
      });
  });";
}
   ?>
</script>

</body>
</html>
