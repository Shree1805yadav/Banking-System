<?php
$conn = new mysqli("localhost", "root", "", "bank");

$id = $_POST['id'];

$sql = "SELECT * FROM customer where Sr_no  = $id";
$que = $conn->query($sql);
$result = $que->fetch_assoc();

echo $result['Name'].'~'.$result['Current_balance'];