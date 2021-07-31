<?php

/** @var array $data */
//echo $data['title'];

require APP_ROOT . "/Views/includes/head.php";
?>
<title><?= $data['title'] ?></title>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/login-style.css"/>

</head>

<body>

<section id="login-section-wrapper">

    <div id="form-wrapper">
        <form action="<?= URL_ROOT ?>/users/login" method="POST">
            <label>
                Employee ID
                <input type="number" name="employee_id">
            </label>

            <label>
                Password
                <input type="password" name="employee_password">
            </label>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>

</section>

</body>

</html>