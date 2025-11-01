<?php
include 'db.php';
$id = $_POST['id'];
$name = $_POST['student_name'];
$email = $_POST['student_email'];
$phone = $_POST['student_phone'];
$course = $_POST['course_name'];
$semester = $_POST['semester'];
$year = $_POST['year'];

$sql = "UPDATE registrations SET
student_name='$name', student_email='$email', student_phone='$phone',
course_name='$course', semester='$semester', year='$year'
WHERE id=$id";

if ($conn->query($sql)) {
  echo "<h3>Record Updated Successfully!</h3>";
  echo "<a href='view.php'>Back to List</a>";
} else {
  echo "Error: " . $conn->error;
}
?>
