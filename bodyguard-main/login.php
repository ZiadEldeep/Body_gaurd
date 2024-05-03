<?php
require('db_connection.php');

// التأكد من أن المتغيرات محددة
if(isset($_POST['username']) && isset($_POST['password'])) {
    // استعداد البيانات للتحقق
    $username = $_POST['username'];
    $password = $_POST['password'];

    // استعلام SQL للبحث عن سجل مطابق
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    // تنفيذ الاستعلام
    $result = mysqli_query($conn, $query);

    // التحقق من وجود نتيجة
    if(mysqli_num_rows($result) > 0) {
        // تم العثور على سجل مطابق
        $row = mysqli_fetch_assoc($result);
        if($row['role'] == 'admin') {
            // إعادة توجيه المستخدم إلى صفحة الإدارة
            header("Location: admin.php");
        } else {
            // إعادة توجيه المستخدم إلى الصفحة الرئيسية
            header("Location: index.php");
        }
        exit(); // تأكد من توقف تنفيذ البرنامج بعد التوجيه
    } else {
        // لم يتم العثور على سجل مطابق
        echo "اسم المستخدم أو كلمة المرور غير صحيحة!";
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
        .login-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .login-container h2 {
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
        .form-group input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s;
        }
        .form-group input[type="text"]:focus,
        .form-group input[type="password"]:focus {
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
    <div class="login-container">
        <h2>Login</h2>
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
                <input type="submit" value="Login">
                <p>don't have an account? <a href="./register.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>
