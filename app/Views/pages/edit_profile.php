<?php
if (!isset($_SESSION['logged_in_user'])) {
    header('location:' . URL_ROOT . '/users/login');
    die("You are already logged in");
}
/** @var array $data */
require APP_ROOT . "/Views/includes/head.php";
?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/edit-profile-style.css"/>
<title><?= $data['title'] ?></title>

</head>

<body>

<section id="edit-profile-section-wrapper">
    <h3>Edit profile</h3>

    <form action="<?= URL_ROOT ?>/users/update_user" method="POST">


        <label>
            <input type="text" value="<?= $data['user']->first_name ?>" name="first_name" placeholder="First name">
        </label>


        <label>
            <input type="text" value="<?= $data['user']->last_name ?>" name="last_name" placeholder="Last name">
        </label>


        <label>
            <input type="text" value="<?= $data['user']->other_name ?>" name="other_name" placeholder="Other Name">
        </label>


        <label>
            <input type="email" value="<?= $data['user']->email ?>" name="email" placeholder="Email">
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
            <input type="text" value="<?= $data['user']->phone_number ?>" name="phone" placeholder="Phone">
        </label>


        <label>
            <input type="text" value="<?= $data['user']->address ?>" name="address" placeholder="Address">
        </label>


        <input type="submit" name="update-employee" value="Save Changes">

    </form>
    </div>

</section>

</body>

</html>