<?php
include 'db.php';

$subjectQuery = "SELECT * FROM subjects";
$subjectResult = mysqli_query($conn, $subjectQuery);

$subjects = array();

while ($subjectRow = mysqli_fetch_assoc($subjectResult)) {
    $subjects[] = $subjectRow;
}

echo json_encode($subjects);
?>
