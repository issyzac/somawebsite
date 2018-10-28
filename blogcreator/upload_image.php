<?php
$data =  json_decode(file_get_contents('http://php://input'));

echo json_encode($data);
// $fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);

// $timestamp = time();
// $path = $timestamp .".jpg";
// $relativePath = 'uploads/'.$path;

// if (!file_exists('uploads')) {
//     mkdir('uploads', 0777, true);
// }

// file_put_contents(
// 	$relativePath,
// 	file_get_contents('php://input')
// );
// echo "$relativePath uploaded";
exit();