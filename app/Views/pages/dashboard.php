<?php
if (!isset($_SESSION['logged_in_user'])) {
    header('location:' . URL_ROOT . '/users/login');
    die("Unauthorized access");
}

/** @var array $data */
require APP_ROOT . "/Views/includes/head.php";
?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/dashboard-style.css"/>
<title><?= $data['title'] ?></title>

</head>

<body>
<section id="dashboard-wrapper" style="display: flex;">
    <?php require APP_ROOT . "/Views/includes/sidebar.php" ?>

        <div id="flex-child-content">
            <h1 class="page-header"><i class="fa fa-navicon"></i>&nbsp;DASHBOARD</h1>


        <section class="dashboard-grid">
            <div class="grid-child">
                <a href="customer.php">
                    <div class="icon-holder"><i class="fa fa-user"></i></div>
                    <div class="desc-holder">
                        <h3>CUSTOMER</h3>
                    </div>
                </a>
            </div>

            <div class="grid-child">
                <a href="<?= URL_ROOT ?>/pages/supliers">
                    <div class="icon-holder"><i class="fa fa-industry"></i></div>
                    <div class="desc-holder">
                        <h3>SUPPLIER</h3>
                    </div>
                </a>
            </div>

            <div class="grid-child">
                <a href="<?= URL_ROOT ?>/pages/employees">
                    <div class="icon-holder"><i class="fa fa-users"></i></div>
                    <div class="desc-holder">
                        <h3>EMPLOYEES</h3>
                    </div>
                </a>
            </div>

            <div class="grid-child">
                <a href="<?= URL_ROOT ?>/pages/products">
                    <div class="icon-holder"><i class="fa fa-sitemap"></i></div>
                    <div class="desc-holder">
                        <h3>PRODUCTS</h3>
                    </div>
                </a>
            </div>

            <div class="grid-child">
                <a href="order.php">
                    <div class="icon-holder"><i class="fa fa-shopping-cart"></i></div>
                    <div class="desc-holder">
                        <h3>ORDERS</h3>
                    </div>
                </a>
            </div>
            <div class="grid-child">
                <a href="order.php">
                    <div class="icon-holder"><i class="fa fa-pencil-square-o"></i></div>
                    <div class="desc-holder">
                        <h3>ORDER DETAILS</h3>
                    </div>
                </a>
            </div>
            <div class="grid-child">
                <a href="order.php">
                    <div class="icon-holder"><i class="fa fa-info-circle"></i></div>
                    <div class="desc-holder">
                        <h3>EDIT PROFILE</h3>
                    </div>
                </a>
            </div>

            <div class="grid-child">
                <a href="payment.php">
                    <div class="icon-holder"><i class="fa fa-money"></i></div>
                    <div class="desc-holder">
                        <h3>PAYMENT</h3>
                    </div>
                </a>
            </div>
        </section>

    </div>
</section>

</body>

</html>