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
        <li><a href="?m=siswa"><i class="fa fa-laptop"></i> Siswa</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Edit Siswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['nis'];
include "../sambungan.php";
$sql="SELECT * FROM siswa WHERE nis='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
			 <!--Mulai buat form-->
			 <form action="?m=siswa&s=update" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
					<tr>
						<td width=150>NIS</td>
						<td><input type="number" name="nis" value="<?php echo$r['nis'];?>" readonly /></td>
					</tr>
					<tr>
						<td width=150>Nama Pengguna*</td>
						<td><input type="text" name="username" placeholder="Username" size="25px" maxlength="25px" value="<?php echo$r['username'];?>" required /></td>
					</tr>
					<tr>
						<td>Sandi</td>
						<td><input type="password" name="password" placeholder="Password" size="25px" maxlength="32px" /><small>Kosongkan jika tak diubah</small></td>
					</tr>
					<tr>
						<td>Nama Lengkap*</td>
						<td><input type="text" name="nama" placeholder="Nama" size="50px" maxlength="50px" value="<?php echo$r['nama'];?>" required /></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><input type="radio" name="jk" id="jkl" value="L" <?php if($r['jk']=='L') echo " checked";?> />Laki-laki &nbsp;&nbsp;
						<input type="radio" name="jk" id="jkp" value="P" <?php if($r['jk']=='P') echo " checked";?> />Perempuan</td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td><input type="text" name="tempatl" placeholder="Kota/Kab. Tempat Lahir" size="25px" maxlength="30px" value="<?php echo$r['tempatlahir'];?>" /></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td><input type="date" name="tanggall" placeholder="Tanggal Lahir" value="<?php echo$r['tanggallahir']; ?>" /><small>Gunakan browser chrome atau Opera</small></td>
					</tr>
					<tr>
						<td>Handphone</td>
						<td><input type="text" name="hp" placeholder="HP" size="15px" maxlength="15px" value="<?php echo$r['hp'];?>" /></td>
					</tr>
					<tr>
						<td>Surat Elektronik</td>
						<td><input type="email" name="surel" placeholder="Email" size="50px" maxlength="50px" value="<?php echo$r['email'];?>" /></td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td>
							<select name="kelas">
<?php
$sql2="SELECT * FROM kelas ORDER BY kelas";
$query2=mysqli_query($koneksi,$sql2);
while($r2=mysqli_fetch_assoc($query2)){
		echo "<option value='".$r2['idkelas']."'";
		echo $r2['idkelas']==$r['idkelas']?"selected":"";
		echo ">".$r2['kelas']."</option>";
}
?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Aktifkan</td>
						<td><input type="radio" name="aktif" id="aktifY" value="Y" <?php if($r['aktif']=='Y') echo " checked";?> />Ya &nbsp;&nbsp;
						<input type="radio" name="aktif" id="aktifT" value="T" <?php if($r['aktif']=='T') echo " checked";?> />Tidak</td>
					</tr>
					<tr>
						<td>Foto</td>
						<td>
<?php
						if ($r['foto']!=''){
						  echo "<img src=\"../gambar/siswa/$r[foto]\" height=150 />";  
						}
						else{
						  echo "<img src=\"../gambar/siswa/0.jpg\">";
						}
?>
					</tr>
					<tr>
						<td>Ganti Foto</td>
						<td><input type="file" name="foto" accept="image/*" /><small>Kosongkan jika foto tak diganti</small></td>
					</tr>
					<tr>
						<td colspan=3>
						<input type="submit" name="simpan" value="Save" class="btn btn-large btn-primary" />&nbsp;&nbsp;&nbsp;
						<input type="reset" name="reset" value="Reset" class="btn btn-large btn-warning" />&nbsp;&nbsp;&nbsp;
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
