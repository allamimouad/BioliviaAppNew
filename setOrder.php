<?php
session_start();
$order = $_GET['order'];
$href = $_GET['href'];
$_SESSION['order'] = $order;
header('location: '.$href);
?>