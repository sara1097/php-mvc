
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Login</h2>
   <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post" action="/login/authenticate">
  <input name="email" type="email" required />
  <input name="password" type="password" required />
  <button type="submit">Login</button>
  <?php if (!empty($error)) echo "<p>$error</p>"; ?>
</form>

</body>
</html>
