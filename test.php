<?php require_once 'php_action/db_connect.php' ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<form action="php_action/editProvider.php" method="post">
    <input type="number" name="editProviderID" id=""><br>
    <input type="text" name="editProviderName" id=""><br>
    <input type="text" name="editProviderAddress" id=""><br>
    <input type="email" name="editProviderEmail" id=""><br>
    <input type="text" name="editProviderTelefono" id=""><br>
    <input type="text" name="editproviderCategory" id="">

    <input type="submit" value="guardar">
</form>

</body>
</html>

