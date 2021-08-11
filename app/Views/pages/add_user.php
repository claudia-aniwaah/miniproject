<?php
if (!isset($_SESSION['logged_in_user'])) {
    header('location:' . URL_ROOT . '/users/login');
    die("You are already logged in");
}
/** @var array $data */
// echo $data['login_error'];

require APP_ROOT . "/Views/includes/head.php";
?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/add-user-style.css"/>
<title><?= $data['title'] ?></title>

</head>

<body>

<section id="add-user-section-wrapper">
    <h1>ADD USER</h1>
</section>

</body>

</html>