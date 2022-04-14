<?php

function getProducts($mysqli) {
    $sql = "SELECT * FROM products ORDER BY name ASC";
    return $mysqli->query($sql);
}

function getCategoryName($mysqli, $id) {
    $sql = "SELECT name FROM categories WHERE `id` = '$id'";
    $name = mysqli_fetch_row($mysqli->query($sql));
    return $name[0];
}