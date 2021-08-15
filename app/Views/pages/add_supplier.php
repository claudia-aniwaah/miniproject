<?php
if (!isset($_SESSION['logged_in_user'])) {
    header('location:' . URL_ROOT . '/users/login');
    die("You are already logged in");
}
/** @var array $data */
// echo $data['login_error'];

require APP_ROOT . "/Views/includes/head.php";
?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/add-supplier-style.css"/>
<title><?= $data['title'] ?></title>

</head>

<body>

<section id="add-supplier-section-wrapper">
    <div id="form-wrapper">

        <H3>Add Supplier</H3>
        <form action="<?= URL_ROOT ?>/pages/add_supplier" method="POST">
            <label>
                <input type="text" name="supplier_name" placeholder="Supplier Name">
            </label>

            <label>
                <input type="number" min='0' step='1000' name="supplier_id" placeholder="Supplier ID">
            </label>

            <label>
                <input type="number" min ="0"name="phone" placeholder="Phone">
            </label>


            <label>
                <input type="text" name="address" placeholder="Address">
            </label>

            <label>
                <input type="text" name="fax" placeholder="Fax">
            </label>

            <label>
                <input type="email" name="email" placeholder="Email">
            </label>

            <label>
                <input type="text" name="Other detail" placeholder="Other Detail">
            </label>

            <input type="submit" name="add-supplier" value="Add Supplier">
        </form>
    </div>
</section>

</body>

</html>