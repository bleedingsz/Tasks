<?php
    require_once ('classes/dbWorker.php');
    $config = require_once('db_config.php');

    $dbWorker = new dbWorker($config['userName'], $config['userPassword'], 'taskdb');
    $dbWorker->connectDb();
    $data = $dbWorker->getData();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task #5</title>
</head>
<body>


<div class="wrap">
    <div class="table">
        <table>
            <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Телефон</th>
            </tr>
            <? foreach ($data as $row ):?>
            <tr>
                <td><?= $row['Surname']?></td>
                <td><?= $row['Name']?></td>
                <td><?= $row['Secondname']?></td>
                <td><?= $row['Phone']?></td>
            </tr>
            <? endforeach;?>
        </table>
    </div>
</div>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .wrap{
        border-radius: 8px;
        max-width: 80%;
        width: 100%;
        margin: 0 auto;
        padding: 20px;
        background: #b7b7b7;
    }
    table{
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000000;
    }
    table tr, table td, table th{
        border: 1px solid #000000;
    }
    table td{
        padding-left: 5px;
    }
</style>
</body>
</html>