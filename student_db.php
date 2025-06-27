<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "student_db";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if (isset($_POST['submit'])) {
    $student_name = $_POST['student_name'];
    $student_id = $_POST['student_id'];
    $contact_number = $_POST['contact_number'];
    $father_name = $_POST['father_name'];
    $course = $_POST['course'];
    $permanent_address = $_POST['permanent_address'];
    $email_id = $_POST['email_id'];

    $sql = "INSERT INTO students (student_name, student_id, contact_number, father_name, course, permanent_address, email_id)
            VALUES ('$student_name', '$student_id', '$contact_number', '$father_name', '$course', '$permanent_address', '$email_id')";

    if ($conn->query($sql) === TRUE) {
        $message = "✅ Student registered successfully!";
    } else {
        $message = "❌ Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
    <style>
        body {
            margin:0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
                .form-container {
            background-color: #ffffff;
            padding: 35px 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            width: 420px;
        }


        h2 {
            text-align: center;
            color: #444;
            margin-bottom: 25px;
            width: 100%;
             top: 50px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            transition: 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            outline: none;
            border-color: #6e8efb;
            box-shadow: 0 0 8px #6e8efb55;
        }

        input[type="submit"] {
            background: linear-gradient(to right, #6e8efb, #a777e3);
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }

        input[type="submit"]:hover {
            background: linear-gradient(to right, #5a75f5, #925fe3);
            transform: translateY(-1px);
        }

        .msg {
            text-align: center;
            margin-top: 15px;
            font-size: 16px;
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="form-container">
    <div class="container">
  <h2> Student Registration Form</h2>
    <form method="POST" action="">
        <label>Student Name</label>
        <input type="text" name="student_name" required>

        <label>Student ID</label>
        <input type="text" name="student_id" required>

        <label>Contact Number</label>
        <input type="text" name="contact_number" required>

        <label>Father's Name</label>
        <input type="text" name="father_name" required>

        <label>Course</label>
        <input type="text" name="course" required>

        <label>Permanent Address</label>
        <textarea name="permanent_address" rows="3" required></textarea>

        <label>Email ID</label>
        <input type="email" name="email_id" required>

        <input type="submit" name="submit" value="Register">
    </form>

    <?php if (!empty($message)) echo "<div class='msg'>$message</div>"; ?>
</div>

</body>
</html>
