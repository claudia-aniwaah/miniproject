<?php
if (!isset($_SESSION['logged_in_user'])) {
    header('location:' . URL_ROOT . '/users/login');
    die("You are already logged in");
}
/** @var array $data */

require APP_ROOT . "/Views/includes/head.php";
?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/add-product-style.css"/>
<title><?= $data['title'] ?></title>
</head>

<body>

<section id="add-product-section-wrapper">

    <div id="form-wrapper">
        <h3>Add Product</h3>
        <form action="<?= URL_ROOT ?>/pages/add_product" method="POST">

            <label>
                <input type="text" name="Product Name" placeholder="Product Name">
            </label>

            <label>
                <input type="number" min='0' step='1000' name="product_id" placeholder="Product ID">
            </label>

            <label>
                <input type="number" min='0' step='1000' name="category_id" placeholder="Category ID">
            </label>

            <label>
                <input type="number" min='0' step='1000' name="supplier_id" placeholder="Supplier ID">
            </label>

            <label>
                <input type="text" name="brand_name" placeholder="Brand's name">
            </label>

            <label>
                <input type="number" min='0' step='1' name="price" placeholder="Price">

            </label>

            <label>
                <input type="number" min='0' step='1' name="quantity" placeholder="Quantity">
            </label>

            <label>
                <input type="text" name="status" placeholder="Status">
            </label>

            <label>
                <input type="submit" name="add-product" value="Add Product">
            </label>


        </form>
    </div>


</section>

</body>

</html>