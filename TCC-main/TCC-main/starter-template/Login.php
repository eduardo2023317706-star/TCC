<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

  <!-- Importando Materialize CSS -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <!-- Importando Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #fff;
      font-family: 'Poppins', sans-serif;
    }

    .login-card {
      width: 350px;
      text-align: center;
      padding: 40px 30px;
      border-radius: 10px;
    }

    h5 {
      font-weight: 700;
      color: #2f2f5f;
      margin-bottom: 25px;
    }

    .input-field input {
      background-color: #e6e6e6 !important;
      border: none !important;
      padding-left: 12px !important;
      border-radius: 4px !important;
    }

    .input-field input:focus {
      box-shadow: 0 0 0 2px #8b80f9 !important;
      background-color: #fff !important;
    }

    .remember-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 13px;
      margin-top: 10px;
      margin-bottom: 25px;
    }

    .remember-row label {
      color: #7a7a7a;
    }

    .remember-row a {
      color: #8b80f9;
      text-decoration: none;
    }

    .remember-row a:hover {
      text-decoration: underline;
    }

    .btn-login {
      background-color: #8b80f9 !important;
      width: 100%;
      font-weight: 600;
      border-radius: 5px;
    }

    .btn-login:hover {
      background-color: #7267e8 !important;
    }
  </style>
</head>

<body>
  <div class="login-card z-depth-0">
    <h5>LOGIN</h5>
    <form>
      <div class="input-field">
        <input id="username" type="text" required>
        <label for="username">Username</label>
      </div>

      <div class="input-field">
        <input id="password" type="password" required>
        <label for="password">Password</label>
      </div>

      <div class="remember-row">
        <label>
          <input type="checkbox" class="filled-in" />
          <span>Remember me</span>
        </label>
        <a href="#">Forgot?</a>
      </div>

      <button class="btn btn-login waves-effect waves-light" type="submit">
        LOGIN
      </button>
    </form>
  </div>

  <!-- Importando Materialize JS -->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
</body>
</html>