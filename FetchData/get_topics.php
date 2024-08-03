<?php
include 'db.php';

$subjectId = $_GET['subject_id'];

$topicQuery = "SELECT * FROM syllabus WHERE subject_id = $subjectId";
$topicResult = mysqli_query($conn, $topicQuery);

$topics = array();

while ($topicRow = mysqli_fetch_assoc($topicResult)) {
    $topics[] = $topicRow;
}

echo json_encode($topics);
?>
