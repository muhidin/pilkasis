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
        <li><a href="?m=kandidat"><i class="fa fa-laptop"></i> Kandidat</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Kandidat</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['idp'];
include "../sambungan.php";
$sql="SELECT * FROM kandidat WHERE idkandidat='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
					<tr>
						<td width=150>Nama Pengguna</td>
						<td><?php echo$r['username'];?></td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td><?php echo$r['nama'];?></td>
					</tr>
					<tr>
						<td>No Urut Kandidat</td>
						<td><?php echo$r['nokandidat'];?></td>
					</tr>
					<tr>
						<td>Visi</td>
						<td><?php echo$r['visi'];?></td>
					</tr>
					<tr>
						<td>Misi</td>
						<td><?php echo$r['misi'];?></td>
					</tr>
					<tr>
						<td>Aktif</td>
						<td><?php echo $r['aktif'];?></td>
					</tr>
					<tr>
						<td>Foto</td>
						<td>
<?php 
						if ($r['foto']!=''){
						  echo "<img src=\"../gambar/kandidat/$r[foto]\" height=150 />";  
						}
						else{
						  echo "<img src=\"../gambar/kandidat/0.jpg\">";
						}
?>
					</tr>
					<tr>
						<td colspan=2>
						<a href="?m=kandidat&s=edit&idp=<?php echo$id;?>" class="btn btn-large btn-primary"><i class="fa fa-times"></i> Edit</a>
						<a href="?m=kandidat" class="btn btn-large btn-danger"><i class="fa fa-times"></i> List</a></td>
					</tr>
                </tbody>
              </table>
			 </form>
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
