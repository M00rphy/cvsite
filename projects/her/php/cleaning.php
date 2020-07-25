<?php
/*file_put_contents(
    'newFile.txt',
    preg_replace(
        '/\R+/',
        "\n",
        file_get_contents('actualizarAdenda.php')
    )
);*/
foreach (glob("*.*") as $filename) {
    $arr[] = $filename;
}
$length = count($arr);
for ($i = 0; $i < $length; $i++) {
    print_r($arr);
}