<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "elearn";

$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$subjectQuery = "SELECT * FROM subjects";
$subjectResult = mysqli_query($conn, $subjectQuery);

$subjects = array();

while ($subjectRow = mysqli_fetch_assoc($subjectResult)) {
    $subjects[] = $subjectRow;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject and Topic Demo</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Subject Slide bar -->
    <div class="slider-controls">
        <div class="subject">
            <ul class="sublist">
                <?php foreach ($subjects as $subject): ?>
                    <li><a href="index.php?subject_id=<?php echo $subject['subject_id']; ?>"><?php echo $subject['subject_name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <?php
    // If a specific subject is selected, show its topics
    if (isset($_GET['subject_id'])) {
        $selectedSubjectId = $_GET['subject_id'];
        $topicQuery = "SELECT * FROM syllabus WHERE subject_id = $selectedSubjectId";
        $topicResult = mysqli_query($conn, $topicQuery);

        $topics = array();

        while ($topicRow = mysqli_fetch_assoc($topicResult)) {
            $topics[] = $topicRow;
        }
        ?>
        <!-- Topic Sidebar -->
        <div class="sidebar">
            <h2>Topics</h2>
            <ul class="topicList">
                <?php foreach ($topics as $topic): ?>
                    <li><a href="index.php?subject_id=<?php echo $selectedSubjectId; ?>&topic_id=<?php echo $topic['topic_id']; ?>"><?php echo $topic['topic_name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
   <?php } ?>


    <?php
    // If a specific topic is selected, show its content
    if (isset($_GET['topic_id'])) {
        $selectedTopicId = $_GET['topic_id'];
        $contentQuery = "SELECT * FROM syllabus WHERE topic_id = $selectedTopicId";
        $contentResult = mysqli_query($conn, $contentQuery);

        $content = array();

        while ($contentRow = mysqli_fetch_assoc($contentResult)) {
            $content[] = $contentRow;
        }
        ?>
        <!-- Content Container -->
        <div class="container">
            <?php foreach ($content as $item): ?>
                <h2><?php echo $item['topic_name']; ?></h2>
                <p><?php echo $item['topic_content']; ?></p>
            <?php endforeach; ?>
        </div>
   <?php } ?>


</body>

</html>
