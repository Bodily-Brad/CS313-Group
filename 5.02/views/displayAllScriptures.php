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
        <?php
        // Connection to db
        require_once('dbConnection.php');
        require_once('models/scriptures.php');
        
        if (isset($message))
            echo "<h2>$message</h2>";
        
        if (!empty($scriptures))
        {
            foreach ($scriptures as $scripture)
            {
                $topics = getTopicsByScriptureID($scripture['id']);
                include('_displayScripture.php');
            }
        }
        ?>
    </body>
</html>
