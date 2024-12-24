<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $conn = new mysqli("localhost", "root", "", "crud_db");
    if ($conn->connect_error){
        die("Koneksi Gagal : " . $conn->connect_error);
    }

    $sql = "INSERT INTO pendaftar (name, email, phone) VALUES ('$name', '$email', '$phone')";

    //fungsi jikA DATA BERHASIL DIINPUT KEMBALI KE INDEX.PHP
    if($conn->query($sql) === TRUE){
        header("Location: index.php");
    }else {
        echo "Error" . $sql. "<br>" . $conn->error;
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pengguna</title>
  <style>
    /* Mengatur gaya untuk body */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    /* Mengatur gaya container form */
    form {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    /* Mengatur label, input dan spasi antar elemen */
    form input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    /* Mengatur gaya tombol submit */
    form button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    /* Mengatur gaya tombol submit saat di-hover */
    form button:hover {
      background-color: #45a049;
    }

    /* Mengatur gaya teks label */
    form label {
      font-weight: bold;
    }
  </style>
</head>
<body>
    <form action="" method="post">
        Nama : <input type="text" name="name" require><br>
        Email : <input type="text" name="email" require><br>
        Telepon : <input type="text" name="phone" require><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>