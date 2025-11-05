<?php
include 'db.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <form method="POST" action="update.php" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $row['id']; ?>">
      <label>Student Name:</label>
      <input type="text" name="student_name" value="<?= $row['student_name']; ?>" required><br>
      <label>Email:</label>
      <input type="email" name="student_email" value="<?= $row['student_email']; ?>" required><br>
      <label>Phone:</label>
      <input type="tel" name="student_phone" value="<?= $row['student_phone']; ?>" required><br>
      <label>Date of Birth:</label>
      <input type="date" name="date_of_birth" value="<?= $row['date_of_birth']; ?>" required><br>
      <label>Gender:</label>
      <div class="radio-group">
        <input type="radio" id="male" name="gender" value="Male" <?= $row['gender'] == 'Male' ? 'checked' : ''; ?> required> <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" <?= $row['gender'] == 'Female' ? 'checked' : ''; ?> required> <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="Other" <?= $row['gender'] == 'Other' ? 'checked' : ''; ?> required> <label for="other">Other</label>
      </div>
      <label>Address:</label>
      <textarea name="address" required><?= $row['address']; ?></textarea><br>
      <label>Department:</label>
      <select name="department" required>
        <option value="">Select Department</option>
        <option value="Computer Science" <?= $row['department'] == 'Computer Science' ? 'selected' : ''; ?>>Computer Science</option>
        <option value="Business Administration" <?= $row['department'] == 'Business Administration' ? 'selected' : ''; ?>>Business Administration</option>
        <option value="Commerce" <?= $row['department'] == 'Commerce' ? 'selected' : ''; ?>>Commerce</option>
        <option value="Engineering" <?= $row['department'] == 'Engineering' ? 'selected' : ''; ?>>Engineering</option>
        <option value="Science" <?= $row['department'] == 'Science' ? 'selected' : ''; ?>>Science</option>
      </select><br>
      <label>Course:</label>
      <select name="course_name" required>
        <option value="">Select Course</option>
        <option value="BCA" <?= $row['course_name'] == 'BCA' ? 'selected' : ''; ?>>BCA</option>
        <option value="BBA" <?= $row['course_name'] == 'BBA' ? 'selected' : ''; ?>>BBA</option>
        <option value="BCom" <?= $row['course_name'] == 'BCom' ? 'selected' : ''; ?>>BCom</option>
        <option value="BSc Computer Science" <?= $row['course_name'] == 'BSc Computer Science' ? 'selected' : ''; ?>>BSc Computer Science</option>
        <option value="B.E" <?= $row['course_name'] == 'B.E' ? 'selected' : ''; ?>>B.E</option>
        <option value="Btech" <?= $row['course_name'] == 'Btech' ? 'selected' : ''; ?>>Btech</option>
      </select><br>
      <label>Semester:</label>
      <select name="semester" required>
        <option value="">Select Semester</option>
        <option value="1st" <?= $row['semester'] == '1st' ? 'selected' : ''; ?>>1st</option>
        <option value="2nd" <?= $row['semester'] == '2nd' ? 'selected' : ''; ?>>2nd</option>
        <option value="3rd" <?= $row['semester'] == '3rd' ? 'selected' : ''; ?>>3rd</option>
        <option value="4th" <?= $row['semester'] == '4th' ? 'selected' : ''; ?>>4th</option>
        <option value="5th" <?= $row['semester'] == '5th' ? 'selected' : ''; ?>>5th</option>
        <option value="6th" <?= $row['semester'] == '6th' ? 'selected' : ''; ?>>6th</option>
        <option value="7th" <?= $row['semester'] == '7th' ? 'selected' : ''; ?>>7th</option>
        <option value="8th" <?= $row['semester'] == '8th' ? 'selected' : ''; ?>>8th</option>
      </select><br>
      <label>Academic Year:</label>
      <input type="number" name="year" value="<?= $row['year']; ?>" min="2020" max="2030" required><br>
      <label>Preferred Class Time:</label>
      <input type="time" name="preferred_time" value="<?= $row['preferred_time']; ?>" required><br>
      <label>Mode of Study:</label>
      <div class="checkbox-group">
        <?php $modes = explode(',', $row['mode_of_study']); ?>
        <input type="checkbox" id="online" name="mode_of_study[]" value="Online" <?= in_array('Online', $modes) ? 'checked' : ''; ?>> <label for="online">Online</label>
        <input type="checkbox" id="offline" name="mode_of_study[]" value="Offline" <?= in_array('Offline', $modes) ? 'checked' : ''; ?>> <label for="offline">Offline</label>
        <input type="checkbox" id="hybrid" name="mode_of_study[]" value="Hybrid" <?= in_array('Hybrid', $modes) ? 'checked' : ''; ?>> <label for="hybrid">Hybrid</label>
      </div>
      <label>Upload Photo:</label>
      <input type="file" name="photo" accept="image/*"><br>
      <label>Registration Date:</label>
      <input type="datetime-local" name="registration_date" value="<?= date('Y-m-d\TH:i', strtotime($row['registration_date'])); ?>" required><br>
      <button type="submit">Update</button>
    </form>
  </div>
</body>
</html>
<?php
$conn = null;
?>
