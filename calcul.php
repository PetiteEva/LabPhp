
<?php
include ("Calculator.php");



$calculator = new Calculator();

        if ($_GET['op'] == 'sum') {
            echo $_GET['x'] . "+" . $_GET['y'] . "=" . $calculator->sum($_GET['x'], $_GET['y']);
        }
        elseif ($_GET['op'] == 'sub'){
            echo $_GET['x'] . "-" . $_GET['y'] . "=" . $calculator->sub($_GET['x'], $_GET['y']);
        }
        elseif ($_GET['op'] == 'mult'){
            echo $_GET['x'] . "*" . $_GET['y'] . "=" . $calculator->multiply($_GET['x'], $_GET['y']);
        }
        elseif ($_GET['op'] == 'div'){
            echo $_GET['x'] . "/" . $_GET['y'] . "=" . $calculator->divide($_GET['x'], $_GET['y']);
        }


?>



