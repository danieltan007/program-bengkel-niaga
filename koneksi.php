<?php

$conn = mysqli_connect("localhost", "root", "", "bengkel");
if (!$conn) {
     die("Connection Failed: " . mysqli_connect_error());
}
