<?php
class A{
    public function f($a){
        if(method_exists($this, $a))
            return $this->$a();
        else
            return 'error';
    }
    public function startSecondMethod(){
        return 'This method exist. Method start....';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task #4</title>
</head>
<body>
<? $newClass = new A(); ?>

<h1>
    <?= $newClass->f('startSecondMethod'); ?>
</h1>

<style>
    h1{
        text-align: center;
    }
</style>
</body>
</html>