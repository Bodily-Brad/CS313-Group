<?php
// Requires a $scripture record and a $topics array of topic records
echo "<strong>" . $scripture['book'] . ' ' . $scripture['chapter'] . ":" . $scripture['verse'] . "</strong>";
echo ' - "' .  $scripture['content'] . '"<br>';

if (!empty($topics))
{
    $first = true;
    echo "Topics: ";
    foreach ($topics as $topic)
    {
        if (!$first) echo ", ";
        echo $topic['name'];
        $first = false;
    }
    echo "<br>";
    echo "<br>";
}