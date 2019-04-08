<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Friends Book</title></head>

<body>
<h1>My best friends :</h1>
<form action="index.php" method="post"> Name:
    <input type="text" name="name">
    <input type="submit" value="Add Friend">
    <br><br>
    Filter :<input type="text" name="nameFilter" value="<?php if (empty($_POST['nameFilter'])) $nameFilter = NULL; ?>">
    <input type="submit" name="filter" value="Search">
    <input type="checkbox" name="checkbox" value="TRUE">Only names starting with</input>
    <ul>

        <?php

        $filename = 'friends.txt';

        //appending file
        if (isset($_POST['name'])) {
            $nameWritten = $_POST["name"];
            $file = fopen($filename, "a");
            if ($nameWritten != NULL) {
                fwrite($file, "$nameWritten\n");
            }
        }

        //reading file
        $file = fopen($filename, "r");

        if (isset($_POST["nameFilter"]) && strlen($_POST["nameFilter"]) > 0) {
            $nameFilter = $_POST['nameFilter'];
            $fileFilter = fopen($filename, "r");

            $friendsArray = array();
            if ($file != false) {

                while (!feof($file)) {

                    if ($nameFilter != NULL) {

                        if (strstr(fgets($file), "$nameFilter", false) != NULL) {
                            if (isset($_POST["checkbox"])) {
                                $line = fgets($file);
                                $pos = strpos($line, $nameFilter);
                                if ($pos !== false && $pos === 0) {
                                    echo "<li>" . $line . "</li>";
                                }
                            }

                            $line = "<li>" . fgets($fileFilter) . "</li>";
                            echo $line;


                        } else {
                            fgets($fileFilter);
                        }
                    } else {

                        $name = trim(fgets($file));
                        if (strlen($name) > 0) {
                            array_push($friendsArray, $name);
                            echo "<li> $name </li>";
                        }
                    }
                }
                fclose($file);
            }
        }

        if (isset($_POST['name']) && strlen($_POST['name']) > 0) {
            $friendsArray[] = $_POST['name'];
        }


        ?>

    </ul>


</form>
</body>
</html>


