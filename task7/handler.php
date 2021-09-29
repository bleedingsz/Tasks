<?php
define('ROOT_DIR', dirname(__FILE__));
if( isset($_FILES['file']['name']) ){
    $dir = "tempfiles";
    if(!is_dir($dir))
        mkdir($dir);
    $uploadfile = ROOT_DIR . "\\" .$dir . "\\" . basename($_FILES['file']['name']);
    if (!move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile) ||
        $_FILES['file']['type'] != "application/json") {
        echo "файл не загружен!";
        exit();
    }
    $json = json_decode(file_get_contents("$uploadfile", true));

    function writeList($array) {
        $html = '<ul>';
        foreach ($array as $key => $value)
            $html .= is_array($value) ? "$key : " . writeList($value) : "<li>$key : $value</li>";
        return $html."</ul>";
    }
}else{
    echo "что-то пошло не так";
    exit();
}
?>
<? foreach ($json as $item):?>
    <?= (is_object($item) || is_array($item)) ? writeList((array) $item) :  "<li>$item</li>";?>
<? endforeach;?>
<?php unlink($uploadfile);?>
