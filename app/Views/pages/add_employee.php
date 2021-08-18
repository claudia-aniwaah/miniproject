<?php
if (!isset($_SESSION['logged_in_user'])) {
    header('location:' . URL_ROOT . '/users/login');
    die("You are already logged in");
}
/** @var array $data */

require APP_ROOT . "/Views/includes/head.php";
?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/add-employee-style.css"/>
<title><?= $data['title'] ?></title>
</head>

<body>

<section id="add-employee-section-wrapper">

    <div id="form-wrapper">
        <h3>Add Employee</h3>
        <form action="<?= URL_ROOT ?>/pages/add_employee" method="POST">

            <label>
                <input type="text" name="product_name" placeholder="Product Name">
            </label>

            <label>
                <input type="number" min='0' step='1000' name="staff_id" placeholder="Staff ID">
            </label>

            <label>
                <input type="number" min='0' step='1000' name="position_id" placeholder="Position ID">
            </label>

            <label>
                <input type="text" name="first_name" placeholder="First name">
            </label>


            <label>
                <input type="text" name="last_name" placeholder="Last name">
            </label>

            <label>
                <input type="number" min ="0" name="phone" placeholder="Phone">
            </label>


            <label>
                <input type="text" name="address" placeholder="Address">
            </label>

            <label>
                <input type="text" name="username" placeholder="Username">
            </label>

            <label>
                <input type="email" name="email" placeholder="Email">
            </label>
          
            <input type="submit" name="add-employee" value="Add Employee">

        </form>
    </div>


</section>

</body>

</html>