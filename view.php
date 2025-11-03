<?php
include 'db.php';
$result = $conn->query("SELECT * FROM registrations ORDER BY registration_date DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registered Students</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>All Course Registrations</h2>
  <table>
    <tr>
      <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Date of Birth</th><th>Gender</th><th>Address</th><th>Department</th><th>Course</th><th>Semester</th><th>Year</th><th>Preferred Time</th><th>Mode of Study</th><th>Photo</th><th>Registration Date</th><th>Actions</th>
    </tr>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
      <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['student_name']; ?></td>
        <td><?= $row['student_email']; ?></td>
        <td><?= $row['student_phone']; ?></td>
        <td><?= $row['date_of_birth']; ?></td>
        <td><?= $row['gender']; ?></td>
        <td><?= $row['address']; ?></td>
        <td><?= $row['department']; ?></td>
        <td><?= $row['course_name']; ?></td>
        <td><?= $row['semester']; ?></td>
        <td><?= $row['year']; ?></td>
        <td><?= $row['preferred_time']; ?></td>
        <td><?= $row['mode_of_study']; ?></td>
        <td><?= $row['photo'] ? "<img src='{$row['photo']}' alt='Photo' width='50'>" : 'No photo'; ?></td>
        <td><?= $row['registration_date']; ?></td>
        <td>
          <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
          <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Delete this record?')">Delete</a>
        </td>
      </tr>
    <?php } ?>
  </table>
  <br><a href="index.php">Add New Registration</a>
</body>
</html>
