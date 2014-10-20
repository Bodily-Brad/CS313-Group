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
        // put your code here
        // This will be moved to controller
        require_once('dbConnection.php');
        $db = loadDB();
        
        // Get all scriptures
        $query = "
            SELECT *
            FROM   scriptures";

        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $scriptures = $statement->fetchAll();
            $statement->closeCursor();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit;
        }
        
        foreach ($scriptures as $scripture)
        {
            $topics = getTopicsByScriptureID($scripture['id']);
            include('_displayScripture.php');
        }
        
        
        // Gets all topics associates with a specific scripture
        function getTopicsByScriptureID($scriptureId)
        {
            global $db;
            $query = "
                SELECT *
                FROM topics
                INNER JOIN scripture_topic_lookup
                ON scripture_topic_lookup.topic_id = topics.id
                WHERE scripture_topic_lookup.scripture_id = :id";
        
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(':id', $scriptureId);
                $statement->execute();
                $results = $statement->fetchAll();
                $statement->closeCursor();
                return $results;
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
            
            return false;
        }
        
        ?>
    </body>
</html>
