<?php
include "db_conn.php";
$npm = $_GET["npm"];
$sql = "DELETE FROM `user` WHERE npm = $npm";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: index.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
