<!--
5.02 Controller
-->
<?php
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
            include('views/displayAllScriptures.php');
            break;
    }
    
?>