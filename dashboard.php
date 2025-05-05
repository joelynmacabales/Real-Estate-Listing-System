<?php
include_once("connection.php");
include_once("functions.php");

// print($_SESSION["user_id"]);

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$result = $conn->query("SELECT name FROM Users WHERE user_id = $user_id");
$user = $result->fetch_assoc();
$result = $conn->query("SELECT name, profile_picture FROM Users WHERE user_id = $user_id");
$user = $result->fetch_assoc();
echo "<img src='uploads/" . $user['profile_picture'] . "' width='100' height='100'><br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        header {
            background-color: #0d6efd;
            color: white;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        nav {
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 15px 0;
            border-bottom: 1px solid #ddd;
        }
        nav a {
            text-decoration: none;
            color: #0d6efd;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        nav a:hover {
            color: #0056b3;
        }
        .dashboard-container {
            max-width: 800px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            text-align: center;
        }
        .dashboard-container h1 {
            color: #0d6efd;
            margin-bottom: 10px;
        }
        .dashboard-container p {
            color: #666;
            font-size: 1rem;
        }
    </style>
</head>
<body>

    <header>
        <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>
    </header>

    <nav>
        <a href="library.php">Library</a>
        <a href="changepassword.php">Change Password</a>
        <a href="update_profile.php">Update Profile</a>
        <a href="logout.php">Logout</a>
        <?php if (isAdmin()): ?>
            <a href="manage_users.php">Manage Users</a>
        <?php endif; ?>
    </nav>

    <div class="dashboard-container">
        <h1>REAL ESTATE LISTING System</h1>
        <h3>Welcome Panel</h3>
        <p>
            This is your personalized dashboard. From here, you can manage your projects,
            access the library, and update your profile or password.
        </p>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background: #fff0f6;
            color: #444;
        }

        header {
            background: #ffc1cc;
            padding: 30px 0;
            text-align: center;
            color: #fff;
            font-size: 24px;
            border-bottom: 4px dotted #ff99aa;
            box-shadow: 0 4px 8px rgba(255, 192, 203, 0.4);
        }

        nav {
            background: #ffe4e1;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            padding: 15px;
            gap: 15px;
            border-bottom: 2px dashed #ffc0cb;
        }

        nav a {
            background-color: #ffd6e0;
            color: #d6336c;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 20px;
            font-weight: bold;
            box-shadow: 2px 2px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        nav a:hover {
            background-color: #ffb6c1;
            color: white;
        }

        .dashboard-container {
            max-width: 700px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 25px;
            box-shadow: 0 8px 24px rgba(255, 192, 203, 0.2);
            text-align: center;
        }

        .dashboard-container h1 {
            color: #ff69b4;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .dashboard-container h3 {
            color: #ff85a2;
            font-size: 20px;
            margin-top: 0;
        }

        .dashboard-container p {
            color: #666;
            font-size: 16px;
            line-height: 1.5;
        }
    </style>
</head>
<body>

    <header>
        💖 Welcome, <?php echo htmlspecialchars($user['name']); ?>! 💖
    </header>

    <nav>
        <a href="library.php">📚 Library</a>
        <a href="changepassword.php">🔑 Change Password</a>
        <a href="update_profile.php">💅 Update Profile</a>
        <a href="logout.php">🚪 Logout</a>
        <?php if (isAdmin()): ?>
            <a href="manage_users.php">👑 Manage Users</a>
        <?php endif; ?>
    </nav>

    <div class="dashboard-container">
        <h1>🏡 Real Estate Listing System</h1>
        <h3>✨ Welcome Panel ✨</h3>
        <p>
            This is your cozy little dashboard where you can manage projects, 
            browse the library, and sprinkle some updates on your profile or password. 🌸
        </p>
    </div>

</body>
</html>
