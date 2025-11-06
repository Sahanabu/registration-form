<?php
include 'db.php';

$name = $_POST['student_name'];
if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
  echo "Error: Student name should only contain alphabets and spaces.";
  $conn = null;
  exit;
}
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
$password = $_POST['password'];
$search = $_POST['search'];
$url = $_POST['url'];
$interest_level = $_POST['range'];
$favorite_color = $_POST['favorite_color'];

$photo_path = '';
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
  $target_dir = "uploads/";
  if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
  }
  $photo_path = $target_dir . basename($_FILES['photo']['name']);
  move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path);
}

$pdf_path = '';
if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == 0) {
  $target_dir = "uploads/";
  if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
  }
  $pdf_path = $target_dir . basename($_FILES['pdf_file']['name']);
  move_uploaded_file($_FILES['pdf_file']['tmp_name'], $pdf_path);
}

$check_sql = "SELECT id FROM users WHERE student_email = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->execute([$email]);

if ($check_stmt->rowCount() > 0) {
  echo "Error: A user with this email already exists.";
  $conn = null;
  exit;
}

$sql = "INSERT INTO users (student_name, student_email, student_phone, date_of_birth, gender, address, department, course_name, semester, year, preferred_time, mode_of_study, photo, pdf_file, registration_date, password, search, url, interest_level, favorite_color)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->execute([$name, $email, $phone, $date_of_birth, $gender, $address, $department, $course, $semester, $year, $preferred_time, $mode_of_study, $photo_path, $pdf_path, $registration_date, $password, $search, $url, $interest_level, $favorite_color]);

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
      <p><strong>Password:</strong> <?php echo str_repeat('*', strlen($password)); ?></p>
      <p><strong>Interests:</strong> <?php echo $search; ?></p>
      <p><strong>Personal Website:</strong> <?php echo $url; ?></p>
      <p><strong>Interest Level:</strong> <?php echo $interest_level; ?></p>
      <p><strong>Favorite Color:</strong> <span style="width: 50px; height: 30px; background-color: <?php echo $favorite_color; ?>; border: 1px solid #000; display: inline-block;"></span></p>
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
