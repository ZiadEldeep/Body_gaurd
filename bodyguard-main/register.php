<?php
// تحقق من أن النموذج قد تم إرساله
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // تحقق من وجود البيانات المطلوبة
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {
        // تضمين ملف الاتصال بقاعدة البيانات
        include 'db_connection.php';

        // استقبال البيانات من النموذج
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        // استعداد الاستعلام لإدراج البيانات في جدول المستخدمين
        $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

        // تنفيذ الاستعلام
        if (mysqli_query($conn, $sql)) {
            echo "تم تسجيل المستخدم بنجاح.";
        } else {
            echo "خطأ: " . $sql . "<br>" . mysqli_error($conn);
        }

        // إغلاق اتصال قاعدة البيانات
        mysqli_close($conn);
    } else {
        echo "يرجى ملء جميع الحقول المطلوبة.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .register-container h2 {
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #666;
        }
        .form-group input[type="text"],
        .form-group input[type="password"],
        .form-group select {
            width: calc(100% - 24px);
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }
        .form-group input[type="text"]:focus,
        .form-group input[type="password"]:focus,
        .form-group select:focus {
            outline: none;
            border-color: #007bff;
        }
        .form-group input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Register">
                <p>Already have account <a href="./login.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
