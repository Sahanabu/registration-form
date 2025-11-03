<?php
include 'db.php';
$id = $_POST['id'];
$name = $_POST['student_name'];
$email = $_POST['student_email'];
$phone = $_POST['student_phone'];
$date_of_birth = $_POST['date_of_birth'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$department = $_POST['department'];
$course = $_POST['course_name'];
$semester = $_POST['semester'];
$year = $_POST['year'];
$preferred_time = $_POST['preferred_time'];
$mode_of_study = isset($_POST['mode_of_study']) ? implode(',', $_POST['mode_of_study']) : '';
$registration_date = $_POST['registration_date'];

$photo_path = '';
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
  $target_dir = "uploads/";
  if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
  }
  $photo_path = $target_dir . basename($_FILES['photo']['name']);
  move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path);
}

$sql = "UPDATE registrations SET
student_name=?, student_email=?, student_phone=?,
date_of_birth=?, gender=?, address=?,
department=?, course_name=?, semester=?,
year=?, preferred_time=?, mode_of_study=?,
registration_date=?" . ($photo_path ? ", photo=?" : "") . "
WHERE id=?";

$stmt = $conn->prepare($sql);
$params = [$name, $email, $phone, $date_of_birth, $gender, $address, $department, $course, $semester, $year, $preferred_time, $mode_of_study, $registration_date];
if ($photo_path) {
  $params[] = $photo_path;
}
$params[] = $id;

$stmt->execute($params);
if ($stmt->rowCount() > 0) {
  echo "<h3>Record Updated Successfully!</h3>";
  echo "<a href='view.php'>Back to List</a>";
} else {
  echo "No changes made or record not found.";
}
$conn = null;
?>
