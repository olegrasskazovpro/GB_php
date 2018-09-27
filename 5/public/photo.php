<?php
header("Content-type: text/html; charset=utf-8");

$id = $_GET['id'];

$conn = mysqli_connect('localhost', 'root', 'root', 'shop');
$sql = "SELECT name, views FROM gallery WHERE id = $id";
$res = mysqli_query($conn, $sql);
$assoc = mysqli_fetch_all($res, MYSQLI_ASSOC)[0];
$name = $assoc["name"];
$views = ++$assoc["views"];

$sql = "UPDATE shop.gallery SET views = {$views} WHERE id = {$id}";
mysqli_query($conn, $sql);

mysqli_close($conn);

echo "<img src=\"images/max/{$name}\">";
echo "<p>Views: {$views}</p>";