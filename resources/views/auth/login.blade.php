<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
</head>

<body>
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Password:</label>
    <input type="password" name="password" required>
    <p>
      dont have account? <a href="/register">Register here</a>
    </p>
    <button type="submit">Login</button>
  </form>
</body>

</html>
