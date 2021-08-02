<?php
if (!isset($_SESSION['logged_in_user'])) {
    header('location:' . URL_ROOT . '/users/login');
    die("Unauthorized access");
}
echo URL_ROOT;

/** @var array $data */
require APP_ROOT . "/Views/includes/head.php";

?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/product-style.css" />
<title><?= $data['title'] ?></title>

</head>

<body>
    <section id="dashboard-wrapper" style="display: flex;">
        <?php require APP_ROOT . "/Views/includes/sidebar.php" ?>

        <div id="flex-child-content">
            <h1 class="page-header">PRODUCTS</h1>


            <!-- TABLE -->

        </div>
    </section>

</body>

</html>