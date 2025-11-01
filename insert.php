<?php
include 'db.php';

$name = $_POST['student_name'];
$email = $_POST['student_email'];
$phone = $_POST['student_phone'];
$course = $_POST['course_name'];
$semester = $_POST['semester'];
$year = $_POST['year'];

$sql = "INSERT INTO registrations (student_name, student_email, student_phone, course_name, semester, year)
VALUES ('$name', '$email', '$phone', '$course', '$semester', '$year')";

if ($conn->query($sql) === TRUE) {
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration Successful</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Registration Successful!</h2>
    <div class="success-details">
      <p><strong>Name:</strong> <?php echo $name; ?></p>
      <p><strong>Email:</strong> <?php echo $email; ?></p>
      <p><strong>Phone:</strong> <?php echo $phone; ?></p>
      <p><strong>Course:</strong> <?php echo $course; ?></p>
      <p><strong>Semester:</strong> <?php echo $semester; ?></p>
      <p><strong>Year:</strong> <?php echo $year; ?></p>
    </div>
    <a href="view.php">View All Registrations</a>
  </div>
</body>
</html>
<?php
} else {
  echo "Error: " . $conn->error;
}
$conn->close();
?>
