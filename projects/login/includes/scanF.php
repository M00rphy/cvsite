<?php
$images = drawArray(new DirectoryIterator('resources/images'));
$audio = drawArray(new DirectoryIterator('resources/audio'));
$data = drawArray(new DirectoryIterator('resources/data'));
$files = array_merge($images, $audio, $data);
$filesArray = json_encode($files);

echo $filesArray;


function drawArray(DirectoryIterator $directory)
{
    $result = array();
    foreach ($directory as $object) {
        if ($object->isDir() && !$object->isDot()) {
            $result[$object->getFilename()] = drawArray(new DirectoryIterator($object->getPathname()));
        } else if ($object->isFile()) {
            $result[] = $object->getFilename();
        }
    }
    return $result;
}
