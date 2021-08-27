<?php
if (isset($_SESSION['logged_in_user'])) {
    header('location:' . URL_ROOT . '/pages/dashboard');
    die("You are already logged in");
}
/** @var array $data */
// echo $data['login_error'];

require APP_ROOT . "/Views/includes/head.php";
?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/login-style.css"/>
<title><?= $data['title'] ?></title>

</head>

<body>

<section id="login-section-wrapper">

    <div id="form-wrapper">

        <form action="<?= URL_ROOT ?>/users/login" method="POST">
            <h4>
                <center>CAG INVENTORY SYSTEM</center>
            </h4>
            <label>
                Employee ID
                <input type="text" name="employee_id">
            </label>

            <label>
                Password
                <input type="password" name="employee_password">

                <div style="color: red"><?= $data['login_error'] ?></div>
            </label>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>

</section>

</body>

</html>