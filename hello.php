<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/" . $filename;
    move_uploaded_file($tempname, $folder);  

    // Sanitize inputs
    $name1 = mysqli_real_escape_string($conn, $_POST['student-name']);
    $name13 = mysqli_real_escape_string($conn, $_POST['usn']);
    $name2 = mysqli_real_escape_string($conn, $_POST['fathers-name']);
    $name3 = mysqli_real_escape_string($conn, $_POST['mothers-name']);
    $gender = isset($_POST['gender']) ? mysqli_real_escape_string($conn, $_POST['gender']) : '';
    $name7 = mysqli_real_escape_string($conn, $_POST['dob']);
    $name8 = mysqli_real_escape_string($conn, $_POST['email']);
    $name9 = mysqli_real_escape_string($conn, $_POST['level']);
    $name10 = mysqli_real_escape_string($conn, $_POST['department']);
    $name11 = mysqli_real_escape_string($conn, $_POST['tel']);
    $name12 = mysqli_real_escape_string($conn, $_POST['address']);

    // Construct query
    $query = "INSERT INTO lst1 (photo, name, USN, father, mother, gender, dob, email, semester, branch, phone, address) 
              VALUES ('$folder', '$name1', '$name13', '$name2', '$name3', '$gender', '$name7', '$name8', '$name9', '$name10', '$name11', '$name12')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data inserted successfully');</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/crud/parentdetails.php" />
        <?php  
    } else {
        echo "<script>alert('Failed to insert data');</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Student Registration Form</title>
    <style>
        body {
            background-repeat: no-repeat;
            background-size: cover;
            background-color: rgb(188, 244, 247);
        }
        .navbar {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            background-color: #007bff;
            padding: 10px 20px;
            border: 3px solid blue;
        }
        .registration-form {
            width: 50%;
            background-color: #3f54be;
            margin: 30px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .registration-form h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: white;
            font-family: Times New Roman;
            font-weight: bold;
        }
        .registration-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: white;
        }
        .registration-form input[type="text"],
        .registration-form input[type="email"],
        .registration-form input[type="tel"],
        .registration-form select,
        .registration-form input[type="date"],
        .registration-form input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            font-size: 16px;
            font-family: Times New Roman;
        }
        .registration-form .radio-group {
            margin-bottom: 10px;
            color: white;
        }
        .registration-form .radio-group input[type="radio"] {
            margin-right: 5px;
        }
        .registration-form .btn {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: 3px solid blue;
            border-radius: 4px;
            cursor: pointer;
            color: white;
            font-size: 16px;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }
        .registration-form .btn:hover {
            background-color: #007bff;
        }
        .registration-form small {
            display: block;
            margin-top: -10px;
            margin-bottom: 10px;
            font-size: 12px;
            color: #666;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 1rem;
        }
        nav {
            display: flex;
            justify-content: center;
        }
        .nav-list {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }
        .nav-list li {
            position: relative;
            margin: 0 1rem;
        }
        .nav-list a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            transition: background-color 0.3s ease;
        }
        .nav-list a:hover {
            background-color: #007bff;
        }
        
        footer {
            background-color: #007bff;
            padding: 20px;
            text-align: center;
            border-top: 2px solid blue;
        }
        footer div {
            margin-bottom: 10px;
        }
        footer a {
            margin-right: 15px;
            text-decoration: none;
            color: white;
        }
        footer img {
            height: 24px;
            width: 24px;
        }
        footer .social-icons a {
            display: inline-block;
            vertical-align: middle;
        }
        footer .copyright {
            color: white;
        }
        .social-icons a {
            display: inline-block;
            vertical-align: middle;
            height: 24px;
            width: 24px;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXc0clrXf_0tc9r6JHG3S9jk2NqpP6wLogfA&s" width="50" height="50" class="d-inline-block align-top" alt="">
            <a class="navbar-brand" href="#" style="color:white;font-family: Times New Roman;">KSSEM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="home.html" style="color:white;font-family: Times New Roman;">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact_us.html" style="color:white;font-family: Times New Roman;">Contact us</a></li>
                    <li class="nav-item"><a class="nav-link" href="about_us.html" style="color:white;font-family: Times New Roman;">About Us</a></li>
                    
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="registration-form">
        <form action="#" method="POST" enctype="multipart/form-data">
            <h2>Student Details</h2>
            <label for="student-image" style="font-family: Times New Roman;">Student Image:</label>
            <input type="file" name="uploadfile" accept=".pdf,.doc,.docx,.jpg">           
            <small style="color: white;font-family: Times New Roman;"></small>

            <label for="student-name" style="font-family: Times New Roman;">Student Name:</label>
            <input type="text" id="student-name" name="student-name" placeholder="Full Name" required>
            
            <label for="usn" style="font-family: Times New Roman;">USN:</label>
            <input type="text" id="usn" name="usn" placeholder="1KG21XXXXX" required>

            <label for="fathers-name" style="font-family: Times New Roman;">Father's Name:</label>
            <input type="text" id="fathers-name" name="fathers-name" placeholder="Father's Full Name" required>

            <label for="mothers-name" style="font-family: Times New Roman;">Mother's Name:</label>
            <input type="text" id="mothers-name" name="mothers-name" placeholder="Mother's Full Name" required>

            <label style="font-family: Times New Roman;">Gender:</label>
            <div class="radio-group" style="font-family: Times New Roman;">
                <input type="radio" name="gender" value="male" required> Male
                <input type="radio" name="gender" value="female"> Female
                <input type="radio" name="gender" value="other"> Other
            </div>

            <label for="dob" style="font-family: Times New Roman;">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="email" style="font-family: Times New Roman;">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="email@xyz.com" required>

            <label for="level" style="font-family: Times New Roman;">Semester:</label>
            <select id="level" name="level" style="font-family: Times New Roman;" required>
                <option value="1st Semester">1st Semester</option>
                <option value="2nd Semester">2nd Semester</option>
                <option value="3rd Semester">3rd Semester</option>
                <option value="4th Semester">4th Semester</option>
                <option value="5th Semester">5th Semester</option>
                <option value="6th Semester">6th Semester</option>
            </select>

            <label for="department" style="font-family: Times New Roman;">Department:</label>
            <select id="department" name="department" style="font-family: Times New Roman;" required>
                <option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
                <option value="Computer Science Engineering">Computer Science Engineering</option>
                <option value="Artificial Intelligence and Data Science">Artificial Intelligence and Data Science</option>
                <option value="Civil Engineering">Civil Engineering</option>
                <option value="Mechanical Engineering">Mechanical Engineering</option>
            </select>

            <label for="tel" style="font-family: Times New Roman;">Tel/Mobile:</label>
            <input type="text" id="tel" name="tel" placeholder="XXX XXX XXXX" required>

            <label for="address" style="font-family: Times New Roman;">Address for Communication:</label>
            <input type="text" id="address" name="address" placeholder="Enter your address" required><br><br>

            <input type="submit" value="Submit" class="btn" name="register" style="font-family: Times New Roman;">
        </form>
    </div>

    <footer>
        <div>
            <a href="/about" style="font-family: Times New Roman;">About Us</a>
            <a href="/contact" style="font-family: Times New Roman;">Contact</a>
            <a href="/privacy" style="font-family: Times New Roman;">Privacy Policy</a>
            <a href="/terms" style="font-family: Times New Roman;">Terms of Service</a>
        </div>
        <div class="social-icons">
            <a href="https://www.facebook.com">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDy_BNkPSR9l2X5I074rtb6j-z-i2Iz2yblw&s" alt="Facebook" height="50" width="50">
            </a>
            <a href="https://www.instagram.com">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwH--J-ZMUg8puNfUxE6YXQi3yVHuAORDxow&s" height="50" width="50">
            </a>
            <a href="https://www.linkedin.com">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/81/LinkedIn_icon.svg/1200px-LinkedIn_icon.svg.png" alt="LinkedIn" height="50" width="50">
            </a>
        </div>
        <div class="copyright" style="font-family: Times New Roman;">
            &copy; 2024 KSSEM. All rights reserved. Designed and developed by KSSEM ECE.
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRkO37UQW1p3f5Lg5t5czkKDP5zqppRxRZzGQ5/Rv" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqk9R56EeWfNQ/2Piuv2Je5LrKzZd5Hc6OjU6MJeAGy7rRPAh6N6T" crossorigin="anonymous"></script>
</body>
</html>