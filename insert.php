<?php
include 'db.php';

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

$sql = "INSERT INTO registrations (student_name, student_email, student_phone, date_of_birth, gender, address, department, course_name, semester, year, preferred_time, mode_of_study, photo, registration_date)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->execute([$name, $email, $phone, $date_of_birth, $gender, $address, $department, $course, $semester, $year, $preferred_time, $mode_of_study, $photo_path, $registration_date]);

if ($stmt->rowCount() > 0) {
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
      <p><strong>Date of Birth:</strong> <?php echo $date_of_birth; ?></p>
      <p><strong>Gender:</strong> <?php echo $gender; ?></p>
      <p><strong>Address:</strong> <?php echo $address; ?></p>
      <p><strong>Department:</strong> <?php echo $department; ?></p>
      <p><strong>Course:</strong> <?php echo $course; ?></p>
      <p><strong>Semester:</strong> <?php echo $semester; ?></p>
      <p><strong>Year:</strong> <?php echo $year; ?></p>
      <p><strong>Preferred Time:</strong> <?php echo $preferred_time; ?></p>
      <p><strong>Mode of Study:</strong> <?php echo $mode_of_study; ?></p>
      <p><strong>Photo:</strong> <?php echo $photo_path ? "<img src='$photo_path' alt='Photo' width='100'>" : 'No photo uploaded'; ?></p>
      <p><strong>Registration Date:</strong> <?php echo $registration_date; ?></p>
    </div>
    <a href="view.php">View All Registrations</a>
  </div>
</body>
</html>
<?php
} else {
  $errorInfo = $stmt->errorInfo();
  echo "Error: " . $errorInfo[2];
}
$conn = null;
?>
