<?php
    // Handle vars
    if (!isset($name)) $name="";
    if (!isset($nameErr)) $nameErr = "";
    if (!isset($email)) $email = "";
    if (!isset($emailErr)) $emailErr = "";
    if (!isset($major)) $major = "";
    if (!isset($majorErr)) $majorErr = "";
    if (!isset($places)) $places = array();
    if (!isset($comments)) $comments = "";
?>
<h1>2.02 Team Readiness Project</h1>
<h2>CS 313</h2>
<h3>Input Form</h3>
<form action="." method="POST" >
    Name: <input name="name" value="<?=$name ?>"> <?= $nameErr?><br>
    Email: <input name="email" value="<?=$email ?>"> <?=$emailErr ?><br>
    <label>Major</label> <?=$majorErr?><br>
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
    <input type="checkbox" name="places[]" value="North America"
        <?php if (in_array("North America", $places)) echo "checked"; ?>
        >North America<br>
    <input type="checkbox" name="places[]" value="South America"
        <?php if (in_array("South America", $places)) echo "checked"; ?>
        >South America<br>
    <input type="checkbox" name="places[]" value="Europe"
        <?php if (in_array("Europe", $places)) echo "checked"; ?>
        >Europe<br>
    <input type="checkbox" name="places[]" value="Asia"
        <?php if (in_array("Asia", $places)) echo "checked"; ?>                
           >Asia<br>
    <input type="checkbox" name="places[]" value="Australia"
        <?php if (in_array("Australia", $places)) echo "checked"; ?>                   
           >Australia<br>
    <input type="checkbox" name="places[]" value="Africa"
        <?php if (in_array("Africa", $places)) echo "checked"; ?>                   
           >Africa<br>
    <input type="checkbox" name="places[]" value="Antartica"
        <?php if (in_array("Antartica", $places)) echo "checked"; ?>                    
           >Antartica<br>
    Comments<br>
    <textarea name="comments" rows="5" cols="40"><?=$comments?></textarea><br>
    <input type="submit" value="Submit">
    <input type="hidden" name="action" value="submit">
</form>