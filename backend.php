<?php

// Sample data for facts and their likes/dislikes counts
$facts = [
    1 => ["fact" => "Honey never spoils.", "likes" => 0, "dislikes" => 0],
    2 => ["fact" => "The Eiffel Tower can be 15 cm taller during the summer due to iron expansion.", "likes" => 0, "dislikes" => 0]
];

// Check the action and fact_id in the POST request
if (isset($_POST['action']) && isset($_POST['fact_id'])) {
    $action = $_POST['action'];
    $factId = $_POST['fact_id'];

    // Check if the fact_id exists in the facts array
    if (isset($facts[$factId])) {
        if ($action === 'like') {
            $facts[$factId]['likes']++;
        } elseif ($action === 'dislike') {
            $facts[$factId]['dislikes']++;
        }

        // Respond with the updated like/dislike counts
        echo json_encode(["likes" => $facts[$factId]['likes'], "dislikes" => $facts[$factId]['dislikes']]);
    } else {
        // Fact not found
        echo json_encode(["error" => "Fact not found"]);
    }
} else {
    // Invalid request
    echo json_encode(["error" => "Invalid request"]);
}

?>