<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    $name = $email = $major = $comments = "";
    $nameErr = $emailErr = $majorErr = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Check for/get Name from form
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = cleanInput($_POST["name"]);
        }
        // Check for/get Email from form
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = cleanInput($_POST["email"]);
        }
        // Check for/get Major from form
        if (empty($_POST["major"])) {
            $majorErr = "Major is required";
        } else {
            $major = cleanInput($_POST["major"]);
        }
        // Get Comments from form
        $comments = cleanInput($_POST["comments"]);
}    
    
function cleanInput($input) {
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  return $input;
}
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>2.02 Team Readiness Project</h1>
        <h2>CS 313</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            Name: <input name="name" value="<?=$name ?>"><br>
            Email: <input name="email" value="<?=$email ?>"><br>
            <label>Major</label><br>
            <input type="radio" name="major" value="Computer Science"
                <?php if (isset($major) && $major=="Computer Science") echo "checked";?>
            >Computer Science<br>
            <input type="radio" name="major" value="Web Development and Design"
                <?php if (isset($major) && $major=="Web Development and Design") echo "checked";?>
            >Web Development and Design<br>
            <input type="radio" name="major" value="Computer Information Technology"
                <?php if (isset($major) && $major=="Computer Information Technology") echo "checked";?>
            >Computer Information Technology<br>
            <input type="radio" name="major" value="Computer Engineering"
                <?php if (isset($major) && $major=="Computer Engineering") echo "checked";?>
            >Computer Engineering<br>
            <label>Places you have visited</label><br>
            <input type="checkbox">North America<br>
            <input type="checkbox">South America<br>
            <input type="checkbox">Europe<br>
            <input type="checkbox">Asia<br>
            <input type="checkbox">Australia<br>
            <input type="checkbox">Africa<br>
            <input type="checkbox">Antartica<br>
            Comments<br>
            <textarea name="comments" rows="5" cols="40"><?=$comments?></textarea><br>
            <input type="submit" value="Submit">
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
