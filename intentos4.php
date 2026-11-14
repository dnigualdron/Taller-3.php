<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey</title>
</head>
<body>
    <form action="" method="post">
        <h1>Surveys</h1>
        <label for="text">Write the number of people for the Survey</label>
        <input type="number" name="numbers_surveys" required>
        <input type="submit" value="Enviar" name="sent">
    </form>

    <?php
    if(isset($_POST["sent"])){
        $values_numbers = $_POST["numbers_surveys"];
    ?>
    
    <form action="intento4.php" method="post">
        <input type="hidden" name="acu_encuesta" value="<?php echo $values_numbers; ?>">

        <?php
        for ($i = 1; $i <= $values_numbers; $i++) {
        ?>
            <div>
                <h5>Question <?php echo $i; ?></h5>
                <label for="text">Write your age</label>
                <input type="number" name="años<?php echo $i; ?>" required>
            </div>
        <?php
        }
        ?>

        <br>
        <input type="submit" value="Enviar Encuesta(s)" name="envio">
    </form>

    <?php
    }
    ?>
</body>
</html>