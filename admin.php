<?php session_start(); 
    if( ! isset($_SESSION['username']))
    {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="stylesheet.css"> <!-- Link to your CSS file -->
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            font-size: 20px;
            overflow-x: hidden;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

         /* Adjusted styles for image and home section */
         .home-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
        }

        .home-section img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        main {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 200px;
            background-color: #d8d8d8;
            padding: 60px;
            font-family: Arial, sans-serif;
            font-size: 20px;
            font-weight: 800;
        }

        .sidebar a {
            display: block;
            padding: 20px;
            margin-bottom: 15px;
            text-decoration: none;
            color: #333;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #ccc;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Welcome <?= $_SESSION['username'] ?></h1>
    </header>

    <main>
        <div class="sidebar">
            <a href="#home-section">Home</a>
            <a href="index.html">User</a>
            <a href="add_user.php">Add Users</a>
            <a href="summary/home.html">Summary</a>
            <a href="#medal-tally-section">Medal Tally</a>
            <a href="medal games/eventcoordinator_page.html">Event Coordinator</a>
            <a href="summary/tech_page.html">Tech Committee Chair</a>
            <a href="logout.php" id="logout">Log Out</a>
        </div>

        <div class="content">
            <!-- Home Feature Section with Image -->
            <section id="home-section" class="home-section">
                <h2>Welcome to the Admin Dashboard</h2>
                <img src="image/pic2.png" alt="Description of your image">
                <!-- Replace 'your-image-url.jpg' with the actual URL of your image -->
            </section>
        </div>
        
    </main>

    <footer>
        <p>&copy; 2024 Schools Division of Ilocos Norte. All Rights Reserved.</p>
    </footer>
</body>

</html>
