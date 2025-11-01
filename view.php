<?php
include 'db.php';
$result = $conn->query("SELECT * FROM registrations ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registered Students</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>All Course Registrations</h2>
  <table border="1">
    <tr>
      <th>ID</th><th>Name</th><th>Email</th><th>Phone</th>
      <th>Course</th><th>Semester</th><th>Year</th><th>Actions</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['student_name']; ?></td>
        <td><?= $row['student_email']; ?></td>
        <td><?= $row['student_phone']; ?></td>
        <td><?= $row['course_name']; ?></td>
        <td><?= $row['semester']; ?></td>
        <td><?= $row['year']; ?></td>
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
