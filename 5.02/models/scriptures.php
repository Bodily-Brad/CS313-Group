<?php
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
    
    function insertScriptureWithTopics($book, $chapter, $verse, $content, $topicIDs)
    {
        global $db;
        $query = "
            INSERT INTO scriptures (book, chapter, verse, content)
            VALUES (:book, :chapter, :verse, :content)";
        
        // Insert scripture
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':book', $book);
            $statement->bindValue(':chapter', intval($chapter));
            $statement->bindValue(':verse', intval($verse));
            $statement->bindValue(':content', $content);
            
            $statement->execute();
            $newId = $db->lastInsertId();
            
            $statement->closeCursor();
            
            // Insert topics
            if (!empty($topicIDs))
            {
                foreach ($topicIDs as $topicID)
                {
                    insertScriptureTopicLink($newId, $topicID);
                }
            }
            
            return $newId;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        // Else
        return false;        
    }
    
    function insertTopic($name)
    {
        global $db;
        $query = "
            INSERT INTO topics (name)
            VALUES (:name)";
        
        // Insert scripture
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            
            $statement->execute();
            $newId = $db->lastInsertId();
            $statement->closeCursor();

            // Return new ID
            return $newId;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        // Else
        return false;          
    }
    
    function insertScriptureTopicLink($scriptureID, $topicID)
    {
        global $db;
        $query = "
            INSERT INTO scripture_topic_lookup (scripture_id, topic_id)
            VALUES (:scripture_id, :topic_id)";
        
        // Insert scripture
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':scripture_id', intval($scriptureID));
            $statement->bindValue(':topic_id', intval($topicID));
            
            $statement->execute();
            $newId = $db->lastInsertId();
            $statement->closeCursor();
            
            // Return new ID
            return $newId;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        // Else
        return false;           
    }