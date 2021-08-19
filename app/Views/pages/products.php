 <?php
if (!isset($_SESSION['logged_in_user'])) {
    header('location:' . URL_ROOT . '/users/login');
    die("Unauthorized access");
}
/** @var array $data */
require APP_ROOT . "/Views/includes/head.php";

?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/product-style.css"/>
<title><?= $data['title'] ?></title>

</head>

<body>
<section id="dashboard-wrapper" style="display: flex;">
    <?php require APP_ROOT . "/Views/includes/sidebar.php" ?>

    <div id="flex-child-content">

        <div id="float">
            <h1 class="page-header">PRODUCTS</h1>
            <a href="<?= URL_ROOT ?>/pages/add_product">Add product</a>
        </div>


        <div class="product-table-wrapper">

            <?php if (count($data['products']) <= 0) : ?>
                <h1 style="color:#c7c7c7; text-align: center; line-height: 350px;">No Data</h1>
            <?php else : ?>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($data['products'] as $product) : ?>
                        <tr>
                            <th scope="row"><?= $product->product_id ?></th>
                            <td><?= $product->product_name ?></td>
                            <td><?= $product->brand_name ?></td>
                            <td><?= $product->category_name ?></td>
                            <td><?= $product->supplier_name ?></td>
                            <td><?= $product->quantity ?></td>
                            <td>GHS <?= $product->price ?></td>
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




