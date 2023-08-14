<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trip Website - Login</title>
  <link rel="stylesheet" href="index1.css">
</head>
<body>
    <div class="body">
  <div class="container">
    <img src="logo.png" alt="Trip Website Logo">
    <form action="register.php" method="get">
      <h2>Sign up</h2>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="number">Phone number:</label>
        <input type="tel" id="number" name="number" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <button type="submit">Sign up</button>
        <button type="submit" onclick="window.open('index1.php')">Login</button>
      </div>
    </form>
  </div>
    </div>
</body>
</html>
