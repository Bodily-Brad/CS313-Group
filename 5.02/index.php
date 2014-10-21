<!--
5.02 Control
-->
<?php
    // Connect to database
    require_once('dbConnection.php');
    require_once('models/scriptures.php');
    
    $db = loadDB();
    
    // Get Action
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    } elseif (isset($_POST["action"])) {
        $action = $_POST["action"];
    } else {
        $action = "showaddscriptureform";
    }
    
    switch (strtolower($action))
    {
        case "addscripture":
            // Get Values
            $book = getVariable("book");
            $chapter = getVariable("chapter");
            $verse = getVariable("verse");
            $content = getVariable("content");
            $topics = getVariable("topics");
            
            // function insertScriptureWithTopics($book, $chapter, $verse, $content, $topicIDs)
            insertScriptureWithTopics($book, $chapter, $verse, $content, $topics);
            
            $scriptures = getAllScriptures();
            $message = "Code for processing new topics coming...";
            include('views/displayAllScriptures.php');
            break;
        case "showaddscriptureform":
            $scriptures = getAllScriptures();
            $topics = getAllTopics();            
            include('views/addScriptureForm.php');
            break;
        // Show all Scriptures
        default:
            // Get all scriptures
            $scriptures = getAllScriptures();
            $message = "Showing All Scriptures";
            include('views/displayAllScriptures.php');
            break;
    }
    
    function getVariable($variableName)
    {
        if (isset($_GET[$variableName])) {
            $return = $_GET[$variableName];
        } elseif (isset($_POST[$variableName])) {
            $return = $_POST[$variableName];
        } else {
            $return = "";
        }  
        
        return $return;
    }
 
    
?>