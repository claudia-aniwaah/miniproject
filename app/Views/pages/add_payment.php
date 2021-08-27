<?php
if (!isset($_SESSION['logged_in_user'])) {
    header('location:' . URL_ROOT . '/users/login');
    die("You are already logged in");
}
/** @var array $data */

require APP_ROOT . "/Views/includes/head.php";
?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/add-payment-style.css"/>
<title><?= $data['title'] ?></title>
</head>

<body>

<section id="add-payment-section-wrapper">

    <div id="form-wrapper">
        <h3>Add Payment</h3>
        <form action="<?= URL_ROOT ?>/pages/add_payment" method="POST">

            

            <label>
                <input type="number" min='0' step='1000' name="bill_number" placeholder="Bill Number">
            </label>

            <label>
                <input type="text" name="payment_type" placeholder="Payment Type">
                <select name="">
                   <option>Cheque</option></option>
                   <option>Cash</option>
                   <option>Deposit</option>
                   <option>Credit Card</option>
                   <option>Mobile Payment</option></select>
            </label>


            <label>
                <input type="number" min='0' name="amount" placeholder="Amount">
                
            </label>

         
            <input type="submit" name="add-payment" value="Add Payment">

        </form>
    </div>


</section>

</body>

</html>