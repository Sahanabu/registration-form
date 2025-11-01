<?php
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM registrations WHERE id=$id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Registration</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Edit Course Registration</h2>
    <form method="POST" action="update.php">
      <input type="hidden" name="id" value="<?= $row['id']; ?>">
      <label>Name:</label>
      <input type="text" name="student_name" value="<?= $row['student_name']; ?>" required><br>
      <label>Email:</label>
      <input type="email" name="student_email" value="<?= $row['student_email']; ?>" required><br>
      <label>Phone:</label>
      <input type="text" name="student_phone" value="<?= $row['student_phone']; ?>" required><br>
      <label>Course:</label>
      <input type="text" name="course_name" value="<?= $row['course_name']; ?>" required><br>
      <label>Semester:</label>
      <input type="text" name="semester" value="<?= $row['semester']; ?>" required><br>
      <label>Year:</label>
      <input type="number" name="year" value="<?= $row['year']; ?>" required><br>
      <button type="submit">Update</button>
    </form>
  </div>
</body>
</html>
