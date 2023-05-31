<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Animated Login Form | CodingNepal</title>
    <link rel="stylesheet" href="{{ asset('adminstyle.css') }}">
  
  </head>
  <body>
    <div class="center">
      <h1>Admin Login</h1>
      <form action = "{{ url('/admin-auth') }}" method="post">
        @csrf
        <div class="txt_field">
          <input name = "email" type="text" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input name = "password" type="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <input type="submit" value="Login">
        <div class="signup_link">

          {{ session('error') }}
         
        </div>
      </form>
    </div>

  </body>
</html>
