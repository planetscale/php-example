<?php
ini_set('display_errors', 0);

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PlanetScale PHP E-commerce</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
          crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<div>
    <nav class="navbar navbar-dark bg-primary sticky-top">
        <a href="#" class="navbar-brand">
            Product Management App
        </a>

        <div style="color: white; font-weight: bolder">
            <p>Welcome!</p>
        </div>
    </nav>
</div>

<div>
    <?php
    include 'db.php';
    include 'helper/functions.php';
    include 'products.php';
    ?>
</div>

</body>
</html>