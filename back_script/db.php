<?php
$conn = new mysqli("localhost","root", "", "final_project");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}