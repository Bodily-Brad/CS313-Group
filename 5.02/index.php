<!--
5.02 Controller
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
    
?>