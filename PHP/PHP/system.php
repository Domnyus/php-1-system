<?php
session_start();

if (isset($_POST["logout"])) {
    $_SESSION = array();
    session_destroy();
    header('location:'.$_SERVER["PHP_SELF"]);
} else if (isset($_POST["login"])) {
    htmlspecialchars($_POST["username"]);
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $_SESSION["id"] = 0;
        $_SESSION["value"] = 100;
        $_SESSION["username"] = $_POST["username"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">
    <script src="../Bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="./CSS/main.css">
    <script src="./javascript/main.js"></script>
    <title>System</title>
</head>

<body class="">

    <!-- #menu -->
    <div class="container sticky-top">
        <div class="row flex-row-reverse">
            <div class="col-4">
                <?php

                if (!isset($_SESSION["id"])) {
                    echo
                    '
                    <form action="" method="post" class="row">
                        <div class="col-4">
                            <input class="col-12" type="text" name="username" id="username" required maxlength="32" placeholder="Username">
                        </div>
                        <div class="col-4">
                            <input class="col-12" type="password" name="password" id="password" required maxlength="32" placeholder="Password">
                        </div>
                        <div class="col-4">
                            <input class="col-12" type="submit" name="login" id="login" value="Login">
                        </div>
                    </form>
                    ';
                } else {
                    echo
                    '
                    <form action="" method="post" class="row">                        
                        <div class="col-4">
                            <input class="col-12 logout" type="submit" name="logout" id="logout" value="Logout">
                        </div>
                    </form>
                    ';
                }
                ?>

            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-6">
                        <a href="about.php">About</a>
                    </div>
                    <div class="col-6">
                        <a href="contact.php">Contact</a>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="logo">System</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- #account -->
    <?php
    if (isset($_SESSION["id"])) {
        echo
        '
            <div class="container">
            <div class="row">
                <div class="col-6">
                    <h5>Bem-vindo(a), ' . $_SESSION["username"] . '</h5>
                    <h6>Ações</h6>
                    <ul>
                        <li><a onclick="deposit()" href="#">Depositar</a></li>
                        <li><a onclick="withdraw()" href="#">Sacar</a></li>
                    </ul>
                </div>
                <div class="col-6">
                    <h6>Saldo:</h6>
                    <p><span>R$ </span><span id="s-value">' . floatval($_SESSION["value"]) . '</span></p>
                    <p id="w-error"></p>
                </div>
                <div class="col-12 d-none" id="d-value">
                    <form method="post">
                        <label for="value">Valor:</label>
                        <input type="number" name="value" id="value" required minvalue="0">
                        <input type="submit" value="Depositar" name="deposit" class="d-none" id="v-deposit">
                        <input type="submit" value="Sacar" name="withdraw" class="d-none" id="v-withdraw">
                    </form>
                </div>
            </div>
        </div>
            ';
    }
    ?>

    <?php

    if (isset($_SESSION["id"])) {
        if (isset($_POST["value"]) && $_POST["value"] > 0) {
            if (isset($_POST["deposit"])) {
                $_SESSION["value"] += floatval($_POST["value"]);
            } else if (isset($_POST["withdraw"])) {
                if ($_SESSION["value"] - $_POST["value"] >= 0) {
                    $_SESSION["value"] -= $_POST["value"];
                    $_SESSION["w-error"] = "";
                }
                else
                {
                    $_SESSION["w-error"] = "Tentativa de sacar mais que o saldo disponível!";
                }
            }
            echo "
            <script>
                document.querySelector('#s-value').innerHTML = '" . $_SESSION["value"] . "'
            </script>
            ";

            if(isset($_SESSION["w-error"]) && $_SESSION["w-error"] != "")
            {
                echo "
                <script>
                    document.querySelector('#w-error').innerHTML = '" . $_SESSION["w-error"] . "'
                </script>
                ";
            }
        }
    }
    ?>

</body>

</html>