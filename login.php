<!-- Login Page: register.php --> 
<!DOCTYPE html> 
<html lang="en"> 
<head>     
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
    <title>Login</title>     
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Roboto:wght@400;700&display=swap" rel="stylesheet">     
    <style>         
        * {             
            margin: 0;             
            padding: 0;             
            box-sizing: border-box;             
            font-family: 'Roboto', sans-serif;         
        }         
        body {             
            background-color: #111;             
            background-image: radial-gradient(circle at top left, #333, #111);             
            height: 100vh;             
            display: flex;             
            justify-content: center;             
            align-items: center;             
            color: #fff;         
        }         
        .form-container {             
            background: #1c1c1c;             
            padding: 40px;             
            border-radius: 12px;             
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.7);             
            width: 100%;             
            max-width: 420px;             
            border: 1px solid #2c2c2c;         
        }         
        h2 {             
            text-align: center;             
            margin-bottom: 25px;             
            font-family: 'Orbitron', sans-serif;             
            color: #00eaff;         
        }         
        label {             
            font-weight: bold;             
            display: block;             
            margin-bottom: 8px;             
            color: #ccc;         
        }         
        input[type="text"],         
        input[type="password"] {             
            width: 100%;             
            padding: 12px;             
            margin-bottom: 20px;             
            border: none;             
            border-radius: 6px;             
            background: #2a2a2a;             
            color: #fff;             
            font-size: 16px;         
        }         
        input::placeholder {             
            color: #888;         
        }         
        button {             
            width: 100%;             
            padding: 14px;             
            background: linear-gradient(to right, #00eaff, #0072ff);             
            border: none;             
            border-radius: 6px;             
            color: white;             
            font-weight: bold;             
            cursor: pointer;             
            font-size: 16px;             
            transition: background 0.3s, transform 0.2s;         
        }         
        button:hover {             
            background: linear-gradient(to right, #0072ff, #00eaff);             
            transform: scale(1.03);         
        }         
        .form-footer {             
            text-align: center;             
            margin-top: 15px;         
        }         
        .form-footer a {             
            color: #00eaff;             
            text-decoration: none;             
            font-weight: bold;         
        }         
        .form-footer a:hover {             
            text-decoration: underline;         
        }     
    </style> 
</head> 
<body> 
<?php 
include 'conn.php';
session_start(); // Start session at the beginning
if(isset($_POST['btnlogin'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    
    if($name === 'admin' && $password === 'admin'){
        $_SESSION['myuser'] = $name;
        header("Location: admin.php");
    }
    
    $query = "SELECT * FROM crud WHERE name='$name' AND password='$password'";
    $result = mysqli_query($connection, $query);
    
    if(mysqli_num_rows($result) == 1){
        $_SESSION['username'] = $name;
        header("Location: order.php");
        exit(); // Add exit here too
    } else {
        echo "<script>alert('Invalid credentials');</script>";
    } 
}
?> 

<div class="form-container">     
    <form method="POST">         
        <h2>Login</h2>         
        <label for="name">Name</label>         
        <input type="text" id="name" name="name" placeholder="Enter your name" required>         
        <label for="password">Password</label>         
        <input type="password" id="password" name="password" placeholder="Enter password" required>         
        <button type="submit" name="btnlogin">Login</button>         
        <div class="form-footer">             
            <p>Don't have an account? <a href="register.php">Register</a></p>         
        </div>     
    </form> 
</div> 
</body> 
</html>