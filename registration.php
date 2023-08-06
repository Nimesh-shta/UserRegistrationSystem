<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
        body {
            background-color: lightblue;
            text-align:center;
        }
        h2 {
            text-align: center;
        }
        .main {
            height: 35%;
            width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 25px;
            text-align: center;
        }
        label {
            display: block;

            font-weight: bold;
            font-size: 1em;
            text-align: center;
        }
        input {
            border: solid #999 3px;
            height: auto!important;
            line-height: normal!important;
        }
        footer{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="main">
    <h2>User Registration</h2>
    <form action="process_registration.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <input type="submit" value="Register">
    </form>
    </div>
    <br><footer>&copy This Calculator belongs to Nimesh Prasad Shrestha</footer>
</body>
</html>
