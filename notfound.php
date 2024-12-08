<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Page Not Found</title>
  <style>
    /* Reset and basic setup */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background: linear-gradient(135deg, #6d83f3, #8ed1fc);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
      overflow: hidden;
    }

    .container {
      text-align: center;
      animation: fadeIn 1.5s ease-in-out;
    }

    h1 {
      font-size: 8rem;
      letter-spacing: -5px;
      font-weight: 700;
      text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.3);
    }

    p {
      font-size: 1.5rem;
      margin: 1rem 0;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .back-btn {
      display: inline-block;
      padding: 12px 25px;
      margin-top: 20px;
      font-size: 1rem;
      font-weight: bold;
      text-decoration: none;
      color: #6d83f3;
      background: #fff;
      border-radius: 25px;
      box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .back-btn:hover {
      transform: translateY(-5px);
      box-shadow: 4px 6px 12px rgba(0, 0, 0, 0.3);
    }

    /* Animation */
    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: scale(0.9);
      }
      100% {
        opacity: 1;
        transform: scale(1);
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="error-content">
      <h1>404</h1>
      <p>Oops! The page you're looking for doesn't exist.</p>
      <a href="index.php" class="back-btn">Go Back Home</a>
    </div>
  </div>
</body>
</html>
