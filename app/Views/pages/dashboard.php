<?php

/** @var array $data */
require APP_ROOT . "/Views/includes/head.php";
?>
<link rel="stylesheet" href="<?= URL_ROOT ?>/public/assets/css/dashboard-style.css" />
<title><?= $data['title'] ?></title>

</head>

<body>
    <section id="dashboard-wrapper" style="display: flex;">
        <?php require APP_ROOT . "/Views/includes/sidebar.php" ?>

        <div id="flex-child-content">
            <h1>DASHBOARD</h1>

        </div>
    </section>

</body>

</html>