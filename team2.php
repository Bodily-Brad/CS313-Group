<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>2.02 Team Readiness Project</h1>
        <h2>CS 313</h2>
        <form action="display2.php" method="post">
            Name: <input name="name"><br>
            Email: <input name="email"><br>
            <label>Major</label><br>
            <input type="radio" name="major" value="Computer Science">Computer Science<br>
            <input type="radio" name="major" value="Web Development and Design">Web Development and Design<br>
            <input type="radio" name="major" value="Computer information Technology">Computer information Technology<br>
            <input type="radio" name="major" value="Computer Engineering">Computer Engineering<br>
            <label>Places you have visited</label><br>
            <input type="checkbox" name="places[]" value="North America">North America<br>
            <input type="checkbox" name="places[]" value="South America">South America<br>
            <input type="checkbox" name="places[]" value="Europe">Europe<br>
            <input type="checkbox" name="places[]" value="Asia">Asia<br>
            <input type="checkbox" name="places[]" value="Australia">Australia<br>
            <input type="checkbox" name="places[]" value="Africa">Africa<br>
            <input type="checkbox" name="places[]" value="Antartica">Antartica<br>
            Comments: <textarea></textarea><br><br>
			<input type="submit">
        </form>
    </body>
</html>
