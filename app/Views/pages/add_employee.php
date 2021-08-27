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
        <form action="<?= URL_ROOT ?>/users/add_user" method="POST">

            <label>
                <input type="text" name="first_name" placeholder="First name">
            </label>


            <label>
                <input type="text" name="last_name" placeholder="Last name">
            </label>


            <label>
                <input type="text" name="other_name" placeholder="Other Name">
            </label>

            <label>
                <input type="password" name="password" placeholder="Enter password">
            </label>

            <label>
                <input type="email" name="email" placeholder="Email">
            </label>

            <select name="position_id" style="width: 93%; height: 40px; margin: 5px 0;">
                <?php foreach ($data['position'] as $position) : ?>
                    <option value="<?= $position->position_id ?>"><?= $position->position_name ?></option>
                <?php endforeach; ?>
            </select>


            <select name="marital_status_id" style="width: 93%; height: 40px; margin: 5px 0;">
                <?php foreach ($data['marital_status'] as $marital) : ?>
                    <option value="<?= $marital->marital_status_id ?>"><?= $marital->status ?></option>
                <?php endforeach; ?>
            </select>


            <select name="gender_id" style="width: 93%; height: 40px; margin: 5px 0;">
                <?php foreach ($data['gender'] as $gender) : ?>
                    <option value="<?= $gender->gender_id ?>"><?= $gender->gender_name ?></option>
                <?php endforeach; ?>
            </select>


            <label>
                <input type="text" name="phone" placeholder="Phone">
            </label>


            <label>
                <input type="text" name="address" placeholder="Address">
            </label>


            <input type="submit" name="add-employee" value="Add Employee">
        </form>
    </div>


</section>

</body>

</html>