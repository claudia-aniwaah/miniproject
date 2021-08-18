<?php
if (!isset($_SESSION['logged_in_user'])) {
    header('location:' . URL_ROOT . '/users/login');
    die("You are already logged in");
}
/** @var array $data */
// var_dump($data['categories']);

require APP_ROOT . "/Views/includes/head.php";
?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/add-product-style.css" />
<title><?= $data['title'] ?></title>

</head>

<body>

    <section id="add-product-section-wrapper">

        <div id="form-wrapper">
            <h3>Add Product</h3>
            <form action="<?= URL_ROOT ?>/pages/add_product" method="POST">

                <label>
                    <input type="text" name="product_name" placeholder="Product Name">
                </label>

                <select name="category_id" style="width: 93%; height: 40px; margin: 5px 0;">
                    <?php foreach ($data['categories'] as $category) : ?>
                        <option value="<?= $category->category_id ?>"><?= $category->category_name ?></option>
                    <?php endforeach; ?>
                </select>


                <select name="supplier_id" style="width: 93%; height: 40px; margin: 5px 0;">
                    <?php foreach ($data['suppliers'] as $supplier) : ?>
                        <option value="<?= $supplier->supplier_id ?>"><?= $supplier->supplier_name ?></option>
                    <?php endforeach; ?>
                </select>


                <label>
                    <input type="text" name="brand_name" placeholder="Brand's name">
                </label>

                <label>
                    <input type="text" name="price" placeholder="Price">
                </label>

                <label>
                    <input type="text" name="quantity" placeholder="Quantity">
                </label>

                <label>
                    <input type="text" name="status" placeholder="Status">
                </label>

                <label>
                    <input type="submit" name="add_product" value="Add Product">
                </label>


            </form>
        </div>


    </section>

</body>

</html>