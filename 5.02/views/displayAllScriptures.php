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
        
        if (!empty($scriptures))
        {
            foreach ($scriptures as $scripture)
            {
                $topics = getTopicsByScriptureID($scripture['id']);
                include('_displayScripture.php');
            }
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
            
            // Else
            return false;
        }
        
        ?>
    </body>
</html>
