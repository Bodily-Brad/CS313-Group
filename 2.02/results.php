<html>
<body>

Name: <?php echo $name; ?><br>
Your email address is: <?php echo $email; ?><br>
Major: <?php echo $major; ?><br>
Places you have visited: 

<?php
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
