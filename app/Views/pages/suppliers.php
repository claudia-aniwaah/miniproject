<?php
if (!isset($_SESSION['logged_in_user'])) {
    header('location:' . URL_ROOT . '/users/login');
    die("Unauthorized access");
}

/** @var array $data */
require APP_ROOT . "/Views/includes/head.php";
?>

<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/supplier-style.css"/>
<title><?= $data['title'] ?></title>

</head>

<body>
<section id="dashboard-wrapper" style="display: flex;">
    <?php require APP_ROOT . "/Views/includes/sidebar.php" ?>

    <div id="flex-child-content">
        <h1 class="page-header">SUPPLIERS</h1>


        <div class="supplier-table-wrapper">

            <?php if (count($data) === 0) : ?>
                <h1 style="color:#c7c7c7; text-align: center; line-height: 350px;">No Data</h1>
            <?php else : ?>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Supplier Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Fax</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($data['suppliers'] as $supplier) : ?>
                        <tr>
                            <th scope="row"><?= $supplier->supplier_id ?></th>
                            <td><?= $supplier->supplier_name ?></td>
                            <td><?= $supplier->address ?></td>
                            <td><?= $supplier->phone_number ?></td>
                            <td><?= $supplier->email ?></td>
                            <td><?= $supplier->fax ?></td>
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