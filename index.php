<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>tugas basisdata - innerjoin</title>
  </head>
  <body>
  <div class="container">
  <div class="row">
  <h4>Table Konsumen</h4>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID_KONSUMEN</th>
      <th scope="col">KODE_KONSUMEN</th>
      <th scope="col">NAMA_KONSUMEN</th>
      <th scope="col">ALAMAT</th>
      <th scope="col">TYPE_MOTOR</th>
    </tr>
  </thead>
  <?php
  include 'koneksi.php';
  $sql = 'select * from konsumen';
  $query = mysqli_query($tersambung,$sql);
  while($row = mysqli_fetch_array($query)){

  ?>
  <tbody>
    <tr>
      <td><?php echo $row['ID_KONSUMEN']?></td>
      <td><?php echo $row['KODE_KONSUMEN']?></td>
      <td><?php echo $row['NAMA_KONSUMEN']?></td>
      <td><?php echo $row['ALAMAT']?></td>
      <td><?php echo $row['TYPE_MOTOR']?></td>



    </tr>

  </tbody>
  <?php
  }
  ?>
</table>
  </div></div>
  <div class="container">
  <div class="row">
  <h4>Table Service</h4>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID_SERVICE</th>
      <th scope="col">KODE_KONSUMEN</th>
      <th scope="col">JENIS_SERVICE</th>
      <th scope="col">TANGGAL_SERVICE</th>

    </tr>
  </thead>
  <?php
  include 'koneksi.php';
  $sql = 'select * from service';
  $query = mysqli_query($tersambung,$sql);
  while($row = mysqli_fetch_array($query)){

  ?>
  <tbody>
    <tr>
      <td><?php echo $row['ID_SERVICE']?></td>
      <td><?php echo $row['KODE_KONSUMEN']?></td>
      <td><?php echo $row['JENIS_SERVICE']?></td>
      <td><?php echo $row['TANGGAL_SERVICE']?></td>



    </tr>

  </tbody>
  <?php
  }
  ?>
</table>
  </div></div>
  <div class="container">
  <div class="row">
  <h4>Table Sparepart</h4>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID_SPAREPART</th>
      <th scope="col">ID_SERVICE</th>
      <th scope="col">NAMA_SPAREPART</th>
      <th scope="col">QTY_SPAREART</th>
      <th scope="col">HARGA_SPAREPART</th>

    </tr>
  </thead>
  <?php
  include 'koneksi.php';
  $sql = 'select * from sparepart';
  $query = mysqli_query($tersambung,$sql);
  while($row = mysqli_fetch_array($query)){

  ?>
  <tbody>
    <tr>
      <td><?php echo $row['ID_SPAREPART']?></td>
      <td><?php echo $row['ID_SERVICE']?></td>
      <td><?php echo $row['NAMA_SPAREPART']?></td>
      <td><?php echo $row['QTY_SPAREPART']?></td>
      <td><?php echo $row['HARGA_SPAREPART']?></td>



    </tr>

  </tbody>
  <?php
  }
  ?>
</table>
  </div></div>
  <div class="container">
  <div class="row">
  <h4>Table Pembayaran</h4>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID_PEMBAYARAN</th>
      <th scope="col">KODE_KONSUMEN</th>
      <th scope="col">ID_SPAREPART</th>
      <th scope="col">ID_SERVICE</th>
      <th scope="col">TGL_BAYAR</th>
      <th scope="col">TOTAL_BAYAR</th>

    </tr>
  </thead>
  <?php
  include 'koneksi.php';
  $sql = 'select * from pembayaran';
  $query = mysqli_query($tersambung,$sql);
  while($row = mysqli_fetch_array($query)){

  ?>
  <tbody>
    <tr>
      <td><?php echo $row['ID_PEMBAYARAN']?></td>
      <td><?php echo $row['KODE_KONSUMEN']?></td>
      <td><?php echo $row['ID_SPAREPART']?></td>
      <td><?php echo $row['ID_SERVICE']?></td>
      <td><?php echo $row['TGL_BAYAR']?></td>
      <td><?php echo $row['TOTAL_BAYAR']?></td>



    </tr>

  </tbody>
  <?php
  }
  ?>
</table>
  </div></div>
  <div class="container">
  <div class="row">
  <h4>Table Inner Join</h4>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID_PEMBAYARAN</th>
      <th scope="col">KODE_KONSUMEN</th>
      <th scope="col">ID_SPAREPART</th>
      <th scope="col">ID_SERVICE</th>
      <th scope="col">TGL_BAYAR</th>
      <th scope="col">TOTAL_BAYAR</th>
      <th scope="col">ALAMAT</th>
      <th scope="col">TYPE_MOTOR</th>

    </tr>
  </thead>
  <?php
  include 'koneksi.php';
  $sql = 'select    ks.ID_KONSUMEN, ks.NAMA_KONSUMEN, ks.ALAMAT, ks.TYPE_MOTOR, 
                    pb.KODE_KONSUMEN, pb.ID_PEMBAYARAN, pb.ID_SPAREPART, pb.ID_SERVICE, pb.TGL_BAYAR, pb.TOTAL_BAYAR
  from konsumen ks
  inner join pembayaran pb
  on ks.ID_KONSUMEN = pb.ID_PEMBAYARAN';
  $query = mysqli_query($tersambung,$sql);
  while($row = mysqli_fetch_array($query)){

  ?>
  <tbody>
    <tr>
      <td><?php echo $row['ID_PEMBAYARAN']?></td>
      <td><?php echo $row['KODE_KONSUMEN']?></td>
      <td><?php echo $row['ID_SPAREPART']?></td>
      <td><?php echo $row['ID_SERVICE']?></td>
      <td><?php echo $row['TGL_BAYAR']?></td>
      <td><?php echo $row['TOTAL_BAYAR']?></td>
      <td><?php echo $row['ALAMAT']?></td>
      <td><?php echo $row['TYPE_MOTOR']?></td>



    </tr>

  </tbody>
  <?php
  }
  ?>
</table>
  </div></div>
  <div class="container">
  <div class="row">
  <h4>Table Left Join</h4>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID_PEMBAYARAN</th>
      <th scope="col">KODE_KONSUMEN</th>
      <th scope="col">ID_SPAREPART</th>
      <th scope="col">ID_SERVICE</th>
      <th scope="col">TGL_BAYAR</th>
      <th scope="col">TOTAL_BAYAR</th>
      <th scope="col">ALAMAT</th>
      <th scope="col">TYPE_MOTOR</th>

    </tr>
  </thead>
  <?php
  include 'koneksi.php';
  $sql = 'select    ks.ID_KONSUMEN, ks.NAMA_KONSUMEN, ks.ALAMAT, ks.TYPE_MOTOR, 
                    pb.KODE_KONSUMEN, pb.ID_PEMBAYARAN, pb.ID_SPAREPART, pb.ID_SERVICE, pb.TGL_BAYAR, pb.TOTAL_BAYAR
  from konsumen ks
  inner join pembayaran pb
  on ks.ID_KONSUMEN = pb.ID_PEMBAYARAN';
  $query = mysqli_query($tersambung,$sql);
  while($row = mysqli_fetch_array($query)){

  ?>
  <tbody>
    <tr>
      <td><?php echo $row['ID_PEMBAYARAN']?></td>
      <td><?php echo $row['KODE_KONSUMEN']?></td>
      <td><?php echo $row['ID_SPAREPART']?></td>
      <td><?php echo $row['ID_SERVICE']?></td>
      <td><?php echo $row['TGL_BAYAR']?></td>
      <td><?php echo $row['TOTAL_BAYAR']?></td>
      <td><?php echo $row['ALAMAT']?></td>
      <td><?php echo $row['TYPE_MOTOR']?></td>



    </tr>

  </tbody>
  <?php
  }
  ?>
</table>
  </div></div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>