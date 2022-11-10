<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 7</title>
    <meta charset="utf-8" />
</head>

<body>

    <?php
    $correcto = true;

    ?>

    <form action="ejercicio7.php" method="post">

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

        <label for="peseta">Pesetas</label>
        <input type="radio" name="moneda" id="peseta" value="peseta" <?php
                                                                        if (!isset($_POST['btnEnviar']) || $_POST["moneda"] == "peseta") {
                                                                            echo "checked";
                                                                        }

                                                                        ?> />

        <label for="dolar">Dolares</label>
        <input type="radio" name="moneda" id="dolar" value="dolar" <?php
                                                                    if (isset($_POST['btnEnviar']) && $_POST["moneda"] == "dolar") {
                                                                        echo "checked";
                                                                    }

                                                                    ?> />





        <input type="submit" name="btnEnviar" value="Calcular" />

    </form>


    <?php
    if (isset($_POST['btnEnviar']) && $correcto) {
        echo calcularMoneda($_POST['moneda'], $_POST['euros']);
    }

    function calcularMoneda($tipo, $cantidad)
    {

        if ($tipo == "peseta") {
            echo $cantidad . " EUROS SON: " . ($cantidad * 166.386) . " PESETAS.";
        } else {
            echo $cantidad . " EUROS SON: " . ($cantidad * 1.02) . " DOLARES.";
        }
    }
    ?>
    </form>
</body>

</html>