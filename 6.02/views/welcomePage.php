<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="6.02.css" media="screen">
        <title>6.02 Welcome Page</title>
    </head>
    <body>
        <h1>"Homepage"</h1>
        <?php
        // Get username from session
        // put your code here
        ?>
        Welcome, <?=$username?><br>
        <a href="?action=logout">Sign Out</a>
    </body>
</html>
