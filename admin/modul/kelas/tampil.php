<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrator Pilkasis
        <small>Pemilihan Ketua OSIS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="?m=kelas"><i class="fa fa-laptop"></i> Kelas</a></li>
        <li class="active">Daftar</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			  <a href="?m=kelas&s=tambah" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah Kelas</a>
              <h3 class="box-title">Daftar Kelas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kelas</th>
                  <th>Jumlah Siswa</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                
<?php
include "../sambungan.php";
$sql="SELECT * FROM kelas ORDER BY idkelas";
$query=mysqli_query($koneksi,$sql);
if(mysqli_num_rows($query)==0){
	echo "<td colspan='6'>Data Masih Kosong</td>";
}else{
	$no=1;
	while($r=mysqli_fetch_assoc($query)){
	  echo "<tr>";
		echo "<td>$no</td>";
		echo "<td><a href='?m=kelas&s=detail&id=".$r['idkelas']."'>".$r['kelas']."</a></td>";
		echo "<td>".$r['jumlah']."</td>";
		echo '<td><a href="index.php?m=kelas&s=edit&id='.$r['idkelas'].'">Edit</a> | <a href="index.php?m=kelas&s=hapus&id='.$r['idkelas'].'" onclick="return confirm(\'Yakin Akan dihapus?\')">Hapus</a></td>';
	  echo "</tr>";
		$no++;
	}
}
?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Kelas</th>
                  <th>Jumlah Siswa</th>
                  <th>Opsi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<?php include "bawah.php"; ?>
