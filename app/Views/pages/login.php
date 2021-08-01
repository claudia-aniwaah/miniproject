<?php

/** @var array $data */
// echo $data['login_error'];

require APP_ROOT . "/Views/includes/head.php";
?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/login-style.css" />
<title><?= $data['title'] ?></title>

</head>

<body>

    <section id="login-section-wrapper">

        <div id="form-wrapper">

            <form action="<?= URL_ROOT ?>/users/login" method="POST">

                <label>
                    Employee ID
                    <input type="number" min='0' step='1000' name="employee_id">
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