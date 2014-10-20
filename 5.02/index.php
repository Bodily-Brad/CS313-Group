<!--
5.02 Control
-->
<?php
    // Connect to database
    require_once('dbConnection.php');
    $db = loadDB();
    
    // Get Action
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    } elseif (isset($_POST["action"])) {
        $action = $_POST["action"];
    } else {
        $action = "none";
    }
    
    switch (strtolower($action))
    {
        // Show all Scriptures
        default:
            // Get all scriptures
            $scriptures = getAllScriptures();
            include('views/displayAllScriptures.php');
            break;
    }
    
    // Retrieves all scriptures from the database as an array of records
    function getAllScriptures()
    {
        global $db;

        // Get all scriptures
        $query = "
            SELECT *
            FROM   scriptures";

        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit;
        }

        // Else
        return false;
    }
    
    // Retrieves all topics from the database as an array of records
    function getAllTopics()
    {
        global $db;

        // Get all topics
        $query = "
            SELECT *
            FROM   topics";

        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit;
        }

        // Else
        return false;        
    }
    
    // Retrieves all topics associates with a specific scripture as an array of records
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