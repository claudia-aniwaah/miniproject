<?php
if (!isset($_SESSION['logged_in_user'])) {
    header('location:' . URL_ROOT . '/users/login');
    die("Unauthorized access");
}
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


            <div class="supplier-table-wrapper">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>

            </div>


        </div>
    </section>

</body>

</html>