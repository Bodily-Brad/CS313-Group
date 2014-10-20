<?php
// Requires a $scripture record and a $topics array of topic records
echo "<strong>" . $scripture['book'] . ' ' . $scripture['chapter'] . ":" . $scripture['verse'] . "</strong>";
echo ' - "' .  $scripture['content'] . '"<br>';

if (!empty($topics))
{
    echo "<ul>";
    foreach ($topics as $topic)
    {
        echo "<li>{$topic['name']}</li>";
    }
    echo "</ul>";
}