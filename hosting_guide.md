t# Cloud Hosting Guide for Course Registration Application

## Overview

This guide provides step-by-step instructions for deploying the Course Registration web application to a cloud platform. We'll use 000webhost (a free hosting service) as an example, but the process is similar for other providers.

## Prerequisites

- Completed Course Registration application files
- Local MySQL database with sample data (optional)
- Internet connection
- Free account on a hosting platform

## Step 1: Choose a Hosting Platform

For this project, we'll use 000webhost, which offers:
- Free hosting with PHP and MySQL support
- Unlimited bandwidth
- 1GB storage
- Easy-to-use control panel

Alternatives:
- InfinityFree
- Heroku (with ClearDB add-on)
- AWS Free Tier
- Google Cloud Platform Free Tier

## Step 2: Create an Account

1. Visit https://www.000webhost.com/
2. Click "Sign Up" and create a free account
3. Verify your email address
4. Log in to your account dashboard

## Step 3: Set Up Your Website

1. In the dashboard, click "Create a new website"
2. Choose a website name (subdomain) - e.g., yourproject.000webhostapp.com
3. Select the free plan
4. Wait for the website to be created (usually takes a few minutes)

## Step 4: Access File Manager and Database

1. Once your website is created, click "Manage Website"
2. Note down your FTP credentials (username, password, host)
3. Click "Database Manager" to create a MySQL database

### Create Database

1. In Database Manager, click "Create Database"
2. Choose a database name (e.g., college_courses)
3. Set a username and password
4. Note down these credentials - you'll need them later

## Step 5: Upload Application Files

### Using FTP

1. Download and install an FTP client (e.g., FileZilla)
2. Connect to your hosting server using the FTP credentials:
   - Host: files.000webhost.com
   - Username: your FTP username
   - Password: your FTP password
   - Port: 21

3. Upload all your project files to the `public_html` directory:
   - index.php
   - insert.php
   - view.php
   - edit.php
   - update.php
   - delete.php
   - db.php
   - style.css
   - script.js

### Alternative: Using File Manager

1. In your hosting control panel, go to "File Manager"
2. Navigate to `public_html`
3. Click "Upload" and select all your files
4. Upload them to the root directory

## Step 6: Configure Database Connection

1. Edit the `db.php` file in your hosting account (using File Manager or FTP)
2. Update the database credentials:

```php
<?php
$servername = "localhost"; // Usually remains the same
$username = "your_database_username"; // From step 4
$password = "your_database_password"; // From step 4
$dbname = "your_database_name"; // From step 4

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
```

## Step 7: Import Database Schema

### Using phpMyAdmin

1. In your hosting control panel, find "Database Manager" or "phpMyAdmin"
2. Log in to phpMyAdmin with your database credentials
3. Select your database from the left sidebar
4. Click "Import" tab
5. Upload the SQL file containing your database schema:

```sql
CREATE TABLE registrations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_name VARCHAR(100) NOT NULL,
  student_email VARCHAR(100) NOT NULL UNIQUE,
  student_phone VARCHAR(15) NOT NULL,
  course_name VARCHAR(50) NOT NULL,
  semester VARCHAR(10) NOT NULL,
  year INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

6. Click "Go" to execute the import

### Alternative: Using SQL Command

If phpMyAdmin is not available, you can create a PHP file to execute the SQL:

```php
// setup.php
<?php
include 'db.php';

$sql = "CREATE TABLE registrations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_name VARCHAR(100) NOT NULL,
  student_email VARCHAR(100) NOT NULL UNIQUE,
  student_phone VARCHAR(15) NOT NULL,
  course_name VARCHAR(50) NOT NULL,
  semester VARCHAR(10) NOT NULL,
  year INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
```

Upload this file, run it once, then delete it for security.

## Step 8: Test the Application

1. Visit your website URL (e.g., https://yourproject.000webhostapp.com)
2. Test the registration form
3. Submit a test registration
4. Check if data is saved and displayed correctly
5. Test edit and delete functionalities

## Step 9: Troubleshooting

### Common Issues and Solutions

1. **500 Internal Server Error**
   - Check file permissions (should be 644 for files, 755 for directories)
   - Verify PHP version compatibility (000webhost supports PHP 7.x/8.x)

2. **Database Connection Error**
   - Double-check database credentials in db.php
   - Ensure database name, username, and password are correct
   - Verify that the database exists

3. **Blank Page**
   - Enable error reporting by adding this to the top of PHP files:
     ```php
     error_reporting(E_ALL);
     ini_set('display_errors', 1);
     ```

4. **jQuery Not Loading**
   - Ensure internet connection for CDN links
   - Consider downloading jQuery locally if CDN is blocked

5. **Form Not Submitting**
   - Check form action URLs
   - Verify file names and paths
   - Ensure all required fields are present

## Step 10: Security Considerations

1. **Remove Setup Files**: Delete any temporary setup files after deployment
2. **Update Passwords**: Change default passwords to strong ones
3. **Input Validation**: Ensure all user inputs are validated and sanitized
4. **HTTPS**: Most free hosts provide free SSL certificates - enable them
5. **Backup**: Regularly backup your database and files

## Step 11: Maintenance

1. **Monitor Usage**: Check your hosting dashboard for bandwidth and storage usage
2. **Update Code**: Keep your application updated with security patches
3. **Database Optimization**: Regularly clean up old data if necessary
4. **Performance**: Monitor loading times and optimize if needed

## Alternative Hosting Options

### Heroku Deployment

1. Sign up for Heroku account
2. Install Heroku CLI
3. Create a new app: `heroku create your-app-name`
4. Add ClearDB MySQL add-on: `heroku addons:create cleardb:ignite`
5. Deploy code: `git push heroku main`
6. Update database config with Heroku environment variables

### AWS Free Tier

1. Create AWS account
2. Launch EC2 instance (free tier eligible)
3. Install Apache, PHP, MySQL
4. Upload files via SCP or SFTP
5. Configure security groups for web access

## Conclusion

Successfully deploying your Course Registration application to the cloud makes it accessible worldwide. The free hosting options provide a cost-effective way to showcase your project. Remember to regularly update and maintain your application for optimal performance and security.

For any issues during deployment, consult the hosting provider's documentation or community forums.
