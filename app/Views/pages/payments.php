<?php
if (!isset($_SESSION['logged_in_user'])) {
    header('location:' . URL_ROOT . '/users/login');
    die("Unauthorized access");
}
/** @var array $data */
require APP_ROOT . "/Views/includes/head.php";

?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/payment-style.css"/>
<title><?= $data['title'] ?></title>

</head>

<body>
<section id="dashboard-wrapper" style="display: flex;">
    <?php require APP_ROOT . "/Views/includes/sidebar.php" ?>

    <div id="flex-child-content">

        <div id="float">
            <h1 class="page-header">PAYMENTS</h1>
            <a href="<?= URL_ROOT ?>/pages/add_payment">Add Payment</a>
        </div>


        <div class="payment-table-wrapper">

            <?php if (count($data['payments']) <= 0) : ?>
                <h1 style="color:#c7c7c7; text-align: center; line-height: 350px;">No Data</h1>
            <?php else : ?>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Bill Number</th>
                        <th scope="col">Payment Type</th>
                        <th scope="col">Amount</th>
                      
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($data['payments'] as $payment) : ?>
                        <tr>
                            <th scope="row"><?= $payment->bill_number ?></th>
                            <td><?= $payment->payment_type ?></td>
                           
                            <td>GHS <?= $payment->amount ?></td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>


            <?php endif; ?>


        </div>


    </div>
</section>

</body>

</html>




