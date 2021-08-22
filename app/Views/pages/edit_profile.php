<?php
if (!isset($_SESSION['logged_in_user'])) {
    header('location:' . URL_ROOT . '/users/login');
    die("You are already logged in");
}
/** @var array $data */
require APP_ROOT . "/Views/includes/head.php";
?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/add-employee-style.css"/>
<title><?= $data['title'] ?></title>

</head>

<body>

<section id="edit-profile-section-wrapper">
    <h1>Edit profile</h1>

    <!--     action="--><?php //= URL_ROOT ?><!--/users/update_user" -->
</section>

</body>

</html>