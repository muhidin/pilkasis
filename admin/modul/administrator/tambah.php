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
        <li><a href="?m=admin"><i class="fa fa-laptop"></i> Administrator</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Tambah Administrator</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 <!--Mulai buat form-->
			 <form action="?m=admin&s=simpan" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
					<tr>
						<td width=174>Nama Pengguna*</td>
						<td><input type="text" name="username" placeholder="Username" size="25px" maxlength="25px" required /></td>
					</tr>
					<tr>
						<td>Sandi*</td>
						<td><input type="password" name="password" placeholder="Password" size="25px" maxlength="32px" required /></td>
					</tr>
					<tr>
						<td>Nama Lengkap*</td>
						<td><input type="text" name="nama" placeholder="Nama" size="50px" maxlength="50px" required /></td>
					</tr>
					<tr>
						<td>Jabatan*</td>
						<td><input type="text" name="jabatan" placeholder="Jabatan" size="25px" maxlength="30px" required /></td>
					</tr>
					<tr>
						<td>Handphone</td>
						<td><input type="text" name="hp" placeholder="HP" size="15px" maxlength="15px" /></td>
					</tr>
					<tr>
						<td>Surat Elektronik</td>
						<td><input type="email" name="surel" placeholder="Email" size="50px" maxlength="50px" /></td>
					</tr>
					<tr>
						<td>Hak Akses*</td>
						<td>
							<select name="hakakses" required>
								<option value="Magang">Magang</option>
								<option value="Admin">Admin</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Aktifkan</td>
						<td><input type="radio" name="aktif" id="aktifY" value="Y" />Ya &nbsp;&nbsp;
						<input type="radio" name="aktif" id="aktifT" value="T" checked />Tidak</td>
					</tr>
					<tr>
						<td>Foto</td>
						<td><input type="file" name="foto" accept="image/*" /></td>
					</tr>
					<tr>
						<td colspan=3>
						<input type="submit" name="simpan" value="Save" class="btn btn-large btn-primary" />&nbsp;&nbsp;&nbsp;
						<input type="reset" name="reset" value="Reset" class="btn btn-large btn-warning" />&nbsp;&nbsp;&nbsp;
						<a href="?m=admin" class="btn btn-large btn-danger"><i class="fa fa-times"></i> List</a></td>
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
