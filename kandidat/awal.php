<?php 
include_once "atas.php"; 
include_once "../sambungan.php";
//$sql="SELECT kandidat.idkandidat,nama,nokandidat,foto,count(idpemilihan) as kandidat,datapemilihan.idkandidat FROM kandidat FULL OUTER JOIN datapemilihan ON kandidat.idkandidat=datapemilihan.idkandidat";
//$sql="SELECT kandidat.idkandidat as idk,nama,nokandidat,foto, datapemilihan.idpemilihan,count(datapemilihan.idkandidat) as kandidat,datapemilihan.idkandidat FROM kandidat LEFT OUTER JOIN datapemilihan ON kandidat.idkandidat=datapemilihan.idkandidat ORDER BY nokandidat";
$sql="SELECT * FROM kandidat ORDER BY nokandidat";
$query=mysqli_query($koneksi,$sql);

$sqljs="SELECT sum(jumlahsuara) as jsuara FROM kandidat";
$queryjs=mysqli_query($koneksi,$sqljs);
$rjs=mysqli_fetch_array($queryjs);

$idpemilih=$_SESSION['idkkasis'];
$sqlpilih="SELECT * FROM datapemilihan WHERE idpemilih='$idpemilih'";
$querypilih=mysqli_query($koneksi,$sqlpilih);
$ada=mysqli_num_rows($querypilih);

/*$sjumlah="SELECT count(idpemilihan) as kandidat,idkandidat FROM datapemilihan GROUP BY idkandidat ORDER BY idkandidat";
$qjumlah=mysqli_query($koneksi,$sjumlah);
$j=mysqli_fetch_assoc($qjumlah);
*/
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Login Kandidat Pilkasis
        <small>Pemilihan Ketua OSIS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
<?php
//var_dump($sql);
while($r=mysqli_fetch_array($query)){		  
echo '        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">';
echo "<h3>".$r['nokandidat']."</h3>";
echo $r['jumlahsuara']." suara";
echo "<h2>".round(($r['jumlahsuara']/$rjs['jsuara']*100),2)."%</h2>";
echo "<b>".$r['nama']."</b>";
echo '            </div>
            <div class="icon">
              <img src="../gambar/kandidat/'.$r['foto'].'" height="100px"/>
            </div>';
        if($ada==0){
            echo'<a href="?m=kandidat&s=pilihan&id='.$r['idkandidat'].'" class="small-box-footer">Pilihan Anda? <i class="fa fa-arrow-circle-up"></i></a>';
		}else{
			echo '<a href="#" class="small-box-footer">Anda sudah memilih <i class="fa fa-check"></i></a>';
		}
        echo '  </div>
        </div>';
}
?>        
      </div>
      <!-- /.row -->

<?php include "bawah.php"; ?>
