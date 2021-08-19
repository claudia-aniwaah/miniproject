<?php
if (!isset($_SESSION['logged_in_user'])) {
    header('location:' . URL_ROOT . '/users/login');
    die("Unauthorized access");
}
/** @var array $data */
require APP_ROOT . "/Views/includes/head.php";

?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/employee-style.css"/>
<title><?= $data['title'] ?></title>

</head>

<body>
<section id="dashboard-wrapper" style="display: flex;">
    <?php require APP_ROOT . "/Views/includes/sidebar.php" ?>

    <div id="flex-child-content">

        <div>
            <h1 class="page-header">EMPLOYEES</h1>
            <a href="<?= URL_ROOT ?>/pages/add_product">Add employee</a>
        </div>


        <div class="employee-table-wrapper">

            <?php if (count($data['staff']) <= 0) : ?>
                <h1 style="color:#c7c7c7; text-align: center; line-height: 350px;">No Data</h1>
            <?php else : ?>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Staff ID</th>
                        <th scope="col">Position ID</th>
                        <th scope="col">Gender ID</th>
                        <th scope="col">Marital Status ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($data['staff'] as $staff) : ?>
                        <tr>
                            <th scope="row"><?= $staff->staff_id ?></th>
                            <td><?= $staff->position_id?></td>
                            <td><?= $staff->gender_id ?></td>
                            <td><?= $staff->marital_status_id?></td>
                            <td><?= $staff->first_name ?></td>
                            <td><?= $staff->last_name ?></td>
                            <td><?= $staff->address?></td>
                            <td><?= $staff->phone?></td>
                            <td><?= $staff->email?></td>
                            <td><?= $staff->username?></td>
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




