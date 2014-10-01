<html>
<body>

Name: <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?><br>
Major: <?php echo $_POST["major"]; ?><br>
Places you have visited: 

<?php
$places = $_POST['places'];
  if(empty($places)) 
  {
    echo("You haven't been anywhere.");
  } 
  else
  {
    $count = count($places);
 
    for($i=0; $i < $count; $i++)
    {
      echo($places[$i] . " ");
    }
  }
  ?>

  </body>
</html>
