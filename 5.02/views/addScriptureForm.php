<!DOCTYPE html>
<?php
    // Requires $scriptures as an array of scriptures
    // Requires $topics as an array of topics
    require_once('dbConnection.php');
    require_once('models/scriptures.php');    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>New Scripture Entry</h1>
        <form method='post'>
            <label>Book: </label><input name="book"><br><br>
            <label>Chapter: </label><input name="chapter"><br><br>
            <label>Verse: </label><input name="verse"><br><br>
            <label>Content: <label><textarea name="content" rows="5" cols="40"></textarea><br><br>
            Topic(s):<br>
            <?php
            if (empty($topics)) $topics = array();
                foreach ($topics as $topic):?>
                    <input type="checkbox" name="$topic['name']" value="$topic['id']"><?=$topic['name']?><br>
            <?php endforeach; ?>
                    <input type='checkbox' name='topics[]' value='other'>Other <input name='other'><br><br>
            <input type='hidden' name='action' value='addScripture'>
            <input type='submit' value='Submit'>
        </form>
        <h1>Entered Scriptures</h1>
        <?php
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

