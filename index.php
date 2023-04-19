<?php
    session_start();
    $total = 0;

    if(isset($_SESSION['cumul'])) {
        $total = $_SESSION['cumul'];
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = array_map('trim', $_POST);

            if(isset($data['raz'])) {
                session_destroy();
                header('Location: /');
            }

            if(isset($data['toAdd']) && !empty($data['toAdd'])) {
                $total += $data['toAdd'];
                $_SESSION['cumul'] = $total;
            }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super cumulator !</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <h1>Super Cumulator !</h1>

        <form method="post">
            <p>
                <input type="number" name="toAdd" id="toAdd">
            </p>
            <p>
                <input type="submit" value="OK" id="validationBtn">
                <input type="submit" name= "raz" value="RAZ">
            </p>
        </form>

        <div id="result">
            <p>
                <?= $total ?>
            </p>
        </div>
    </main>
</body>
</html>