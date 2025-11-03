<!DOCTYPE html>
<html>
<head>
  <title>College Course Registration</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="script.js"></script>
</head>
<body>
  <div class="container" style="border: 2px solid #667eea; padding: 25px;">
    <h2>College Course Registration Form</h2>
    <p style="text-align: center; margin-bottom: 20px; color: #666; font-size: 16px;">Welcome to our college course registration system. Please fill out the form below to register for your course.</p>
    <form id="courseForm" method="POST" action="insert.php" enctype="multipart/form-data">
      <label>Student Name:</label>
      <input type="text" name="student_name" required><br>

      <label>Email:</label>
      <input type="email" name="student_email" required><br>

      <label>Phone:</label>
      <input type="tel" name="student_phone" required><br>

      <label>Date of Birth:</label>
      <input type="date" name="date_of_birth" required><br>

      <label>Gender:</label>
      <div class="radio-group">
        <input type="radio" id="male" name="gender" value="Male" required> <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" required> <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="Other" required> <label for="other">Other</label>
      </div>

      <label>Address:</label>
      <textarea name="address" required></textarea><br>

      <label>Department:</label>
      <select name="department" required>
        <option value="">Select Department</option>
        <option value="Computer Science">Computer Science</option>
        <option value="Business Administration">Business Administration</option>
        <option value="Commerce">Commerce</option>
        <option value="Engineering">Engineering</option>
        <option value="Science">Science</option>
      </select><br>

      <label>Course:</label>
      <select name="course_name" required>
        <option value="">Select Course</option>
        <option value="BCA">BCA</option>
        <option value="BBA">BBA</option>
        <option value="BCom">BCom</option>
        <option value="BSc Computer Science">BSc Computer Science</option>
        <option value="B.E">B.E</option>
        <option value="Btech">Btech</option>
      </select><br>

      <label>Semester:</label>
      <select name="semester" required>
        <option value="">Select Semester</option>
        <option value="1st">1st</option>
        <option value="2nd">2nd</option>
        <option value="3rd">3rd</option>
        <option value="4th">4th</option>
        <option value="5th">5th</option>
        <option value="6th">6th</option>
        <option value="7th">7th</option>
        <option value="8th">8th</option>
      </select><br>

      <label>Academic Year:</label>
      <input type="number" name="year" min="2020" max="2030" required><br>

      <label>Preferred Class Time:</label>
      <input type="time" name="preferred_time" required><br>

      <label>Mode of Study:</label>
      <div class="checkbox-group">
        <input type="checkbox" id="online" name="mode_of_study[]" value="Online"> <label for="online">Online</label>
        <input type="checkbox" id="offline" name="mode_of_study[]" value="Offline"> <label for="offline">Offline</label>
        <input type="checkbox" id="hybrid" name="mode_of_study[]" value="Hybrid"> <label for="hybrid">Hybrid</label>
      </div>

      <label>Upload Photo:</label>
      <input type="file" name="photo" accept="image/*" required><br>

      <label>Registration Date:</label>
      <input type="datetime-local" name="registration_date" required><br>
      <button type="submit">Register</button>
      </form>
    <p style="text-align: center; margin-top: 15px; color: #666; font-size: 14px;">Please ensure all information is correct before submitting.</p>
    <a href="view.php">View All Registrations</a>
  </div>
</body>
</html>
