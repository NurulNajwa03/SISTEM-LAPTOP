<?php 
//sambungan ke pangkalan data
include "config.php";
//sambung fail header
include "header.php";


//mulakan sesi login untuk kekalkan login
if (isset($_POST['email'])){
  //pembolehubah untuk memegang data yang dihantar
  $email = $_POST['email'];
  $nama = $_POST['nama'];
 
  //tambah rekod baru dalam table
  $sql = " INSERT INTO masuk (email,nama) VALUES ('$email','$nama')";
  //melaksanakan pertanyaan sql dengan sambungan ke p.data
  $hasil = mysqli_query($samb, $sql);
  //semak untuk melihat jika ada sebarang rekod dalam pangkalan data
  //papar mesej berjaya atau gagal simpan rekod baharu
  if ($hasil){
      echo "<script>alert('LOGIN BERJAYA');
      window.Location='index.php'</script> ";
  } else{
      echo "<script>alert('LOGIN GAGAL');
      window.Location='login.php'</script> ";
  }
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <title>Servis laptop</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">

  <html>
    <h2>Log In To Your Account</h2>
    <body>
        <fieldset>
            <!-- papar borang pendaftaran -->
            <form method="POST">
                <label> Email</label><br>
                <input type="text" name="email" placeholder="@gmail.com"  size="50" required><br>

                <label>Nama Anda</label><br>
                <input type="text" name="nama" id="nama" placeholder="Nama Anda" size="60" required> <br><br>

                <!-- butang daftar & reset -->
                <button type="submit"><a href="index.php">login</a> </button>
            
            </form>
        </fieldset>
    </body>
  </html>