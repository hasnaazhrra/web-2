<?php include_once 'top.php';

require_once 'koneksi.php';

if (isset($_GET['pesanan_id'])) {
  $pesanan_id = $_GET['pesanan_id'];
  
  // Hitung total yang harus dibayar
  $query = "SELECT SUM(dp.jumlah * pr.harga) as total, p.diskon
            FROM detail_pesanan dp
            JOIN produk pr ON dp.produk_id = pr.id
            JOIN pesanan p ON dp.pesanan_id = p.id
            WHERE dp.pesanan_id = $pesanan_id";
  $result = mysqli_query($koneksi, $query);
  $row = mysqli_fetch_assoc($result);
  
  $total = $row['total'];
  $diskon = $row['diskon'];
  $total_bayar = $total - ($total * $diskon / 100);
}


?>

    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
        <?php include_once 'navbar.php'; ?>
      <!--end::Header-->

      <!--begin::Sidebar-->
          <?php include_once 'sidebar.php'; ?>
      <!--end::Sidebar-->

      <!--begin::App Main-->
     
      <!--end::App Main-->
      
        <?php include_once 'footer.php'; ?>

    </div>
    <!-- Button trigger modal -->
    
    <script>
function confirmHapus() {
    return confirm('Apakah Anda yakin ingin menghapus data pegawai ini?');
}
</script>



 
