<?php
use classes\Calculator;
spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});
function damp($variable){
    echo "<pre>";
    print_r($variable);
    echo "</pre>";
}
if($_POST){
    $calc = new Calculator();
    if($_POST['action'])
        $calc->calculate();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculator 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="calculator">
        <h1>Calculator_2</h1>
        <form action="" class="calculator" method="post">
            <textarea name="history" class="history" cols="30" rows="10" placeholder=""><?= $calc->history; ?></textarea>
            <input type="number" placeholder="2+2" name="result" value="<?= $calc->sum ? $calc->sum : 0; ?>">
            <ul class="calculator-buttons">
                <li>
                    <button type="submit" name="action" value="+">+2</button>
                </li>
                <li>
                    <button type="submit" name="action" value="-">-2</button>
                </li>
                <li>
                    <button type="submit" name="action" value="*">*2</button>
                </li>
                <li>
                    <button type="submit" name="action" value="/">/2</button>
                </li>
                <li class="clear">
                    <button type="submit" name="action" value="clear">CLEAR</button>
                </li>
            </ul>
            <span class="error-message <?= $calc->errorMessage ? 'active' : '' ?>"><?= $calc->errorMessage ?></span>
        </form>

    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (document.readyState === "interactive") {
            let textarea = document.getElementsByClassName('history');
            textarea[0].scrollTop = textarea[0].scrollHeight;
        }
    });
</script>
</body>
</html>