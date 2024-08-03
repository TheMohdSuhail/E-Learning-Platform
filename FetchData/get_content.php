<?php
include 'db.php';

$topicId = $_GET['topic_id'];

$contentQuery = "SELECT * FROM syllabus WHERE topic_id = $topicId";
$contentResult = mysqli_query($conn, $contentQuery);

$content = array();

while ($contentRow = mysqli_fetch_assoc($contentResult)) {
    $content[] = $contentRow;
}

echo json_encode($content);
?>
