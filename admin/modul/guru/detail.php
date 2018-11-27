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
        <li><a href="?m=guru"><i class="fa fa-laptop"></i> Guru</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Guru</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['nip'];
include "../sambungan.php";
$sql="SELECT * FROM guru WHERE nip='$id'";
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
						<td>No Induk Guru</td>
						<td><?php echo$r['nip'];?></td>
					</tr>
					<tr>
						<td>Mengajar</td>
						<td><?php echo$r['mengajar'];?></td>
					</tr>
					<tr>
						<td>Handphone</td>
						<td><?php echo$r['hp'];?></td>
					</tr>
					<tr>
						<td>Surat Elektronik</td>
						<td><?php echo$r['email'];?></td>
					</tr>
					<tr>
						<td>Foto</td>
						<td>
<?php 
						if ($r['foto']!=''){
						  echo "<img src=\"../gambar/guru/$r[foto]\" width=150 />";  
						}
						else{
						  echo "<img src=\"../gambar/guru/0.jpg\">";
						}
?>
					</tr>
					<tr>
						<td colspan=2>
						<a href="?m=guru&s=edit&nip=<?php echo$id;?>" class="btn btn-large btn-primary"><i class="fa fa-times"></i> Edit</a>
						<a href="?m=guru" class="btn btn-large btn-danger"><i class="fa fa-times"></i> List</a></td>
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
