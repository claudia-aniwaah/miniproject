<?php
/** @var array $data */
require APP_ROOT . "/Views/includes/head.php";
?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/login-style.css"/>

<title><?= $data['title'] ?></title>

</head>

<body>
<?php require APP_ROOT . "/Views/includes/navigation.php" ?>
<div>
    <form action="<?= URL_ROOT ?>/users/login" method="POST">
        <input type="submit" value="Submit">


    </form>
</div>
</body>

</html>



