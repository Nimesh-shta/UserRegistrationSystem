<?php

$usersFile = 'users.json';
if (!file_exists($usersFile)) {
    file_put_contents($usersFile, '[]');
    chmod($usersFile, 0644); 
}

$errors = [];
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];


if (empty($name)) {
    $errors['name'] = 'Name is required';
}


if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Invalid email address';
}


if (empty($password)) {
    $errors['password'] = 'Password is required';
} elseif (strlen($password) < 8) {
    $errors['password'] = 'Password must be at least 8 characters long';
}

if ($password !== $confirmPassword) {
    $errors['confirm_password'] = 'Passwords do not match';
}


if (!empty($errors)) {

    foreach ($errors as $error) {
        echo '<div>' . $error . '</div>';
    }
    echo '<a href="registration.php">Back to Registration</a>';
    exit();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


$usersData = json_decode(file_get_contents($usersFile), true);


foreach ($usersData as $userData) {
    if ($userData['email'] === $email) {
        echo '<div>Email address is already registered</div>';
        echo '<a href="registration.php">Back to Registration</a>';
        exit();
    }
}


$newUser = [
    'name' => $name,
    'email' => $email,
    'password' => $hashedPassword,
];

$usersData[] = $newUser;

if (file_put_contents($usersFile, json_encode($usersData)) !== false) {
    echo '<div>User registration successful!</div>';
    echo '<a href="registration.php">Back to Registration</a>';
} else {
    echo '<div>Error: Unable to register user. Please try again later.</div>';
    echo '<a href="registration.php">Back to Registration</a>';
}
?>
