<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 6</title>
    <meta charset="utf-8" />
</head>

<body>

    <?php
    $correcto = true;

    ?>

    <form action="ejercicio6.php" method="post">

        <input type="number" id="eu" name="euros" placeholder="Introduce euros..." value="<?php
                                                                                            if (isset($_POST['euros'])) {
                                                                                                echo $_POST['euros'];
                                                                                            }
                                                                                            ?>" />

        <?php
        if (isset($_POST['euros']) && $_POST['euros'] == 0) {
            echo "* CAMPO OBLIGATORIO *";
            $correcto = false;
        }
        ?>
        <input type="submit" name="btnEnviar" value="Calcular pesetas" />

    </form>

    <?php
    if (isset($_POST['btnEnviar']) && $correcto) {
        echo $_POST['euros'] . " EUROS SON: " . ($_POST['euros'] * 166.386) . " PESETAS.";
    }
    ?>
    </form>

</body>

</html>