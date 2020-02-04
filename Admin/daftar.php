<?php 
session_start();
$_SESSION['active_link']=['admin'];
include 'includes/connector.php'; 

if(isset($_SESSION['admin_login'])){
    include 'includes/header.php' ;
    include 'includes/sidebar.php' ;
    ?>
    <div id="content-wrapper">

        <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-table"></i>
            Data Daftar Olimpiade</div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead class="thead-dark">
			<tr>
                <th>No.</th>
				<th>ID DAFTAR</th>
				<th>ID JENIS LOMBA</th>
                <th>ID RAYON</th>
                <th>ID USER</th>
                <th>ID ADMIN</th>
                <th>NPSN</th>
                <th>TANGGAL DAFTAR</th>
                <th>SURAT REKOM</th>
                <th>STATUS</th>
                <th>AKSI</th>
			</tr>
            </thead>
			<tbody>
            <?php
				$result = mysqli_query(
                    $koneksi,
                    "SELECT daftar.ID_DAFTAR, jenis_lomba.ID_JENIS_LOMBA, rayon.ID_RAYON, user.ID_USER, admin.ID_ADMIN, sekolah.NPSN, daftar.TGL_DAFTAR, daftar.SURAT_REKOM, daftar.STATUS_BAYAR
                    FROM daftar, jenis_lomba, rayon, user, admin, sekolah
                    WHERE
                    daftar.ID_JENIS_LOMBA = jenis_lomba.ID_JENIS_LOMBA
                    AND daftar.ID_RAYON = rayon.ID_RAYON
                    AND daftar.ID_USER = user.ID_USER
                    AND daftar.ID_ADMIN = admin.ID_ADMIN
                    AND daftar.NPSN = sekolah.NPSN
                    AND jenis_lomba.ID_JENIS_LOMBA='J0001'");

                if(mysqli_num_rows($result) > 0){
                    //membuat variabel $no untuk menyimpan nomor urut
                    $no = 1;
                    //melakukan perulangan while dengan dari dari query $sql
                    while($data = mysqli_fetch_assoc($result)){
                        //menampilkan data perulangan
                        echo '
                        <tr>
                            <td>'.$no.'</td>
                            <td>'.$data['ID_DAFTAR'].'</td>
                            <td>'.$data['ID_JENIS_LOMBA'].'</td>
                            <td>'.$data['ID_RAYON'].'</td>
                            <td>'.$data['ID_USER'].'</td>
                            <td>'.$data['ID_ADMIN'].'</td>
                            <td>'.$data['NPSN'].'</td>
                            <td>'.$data['TGL_DAFTAR'].'</td>
                            <td>'.$data['SURAT_REKOM'].'</td>
                            <td>'.$data['STATUS_BAYAR'].'</td>
                            <td>
                                <a href="hapus_daftar.php?ID_DAFTAR='.$data['ID_DAFTAR'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
                            </td>
                        </tr>
                        ';
                        $no++;
                    }
                //jika query menghasilkan nilai 0
                }else{
                    echo '
                    <tr>
                        <td colspan="6"><b>Tidak ada data.</b></td>
                    </tr>
                    ';
                }
				?>    
        
            <body>
        </table>
        </div>
            </div>
            </div>
        </div>



    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

<?php 
                include 'includes/footer.php';
                    }else{
    require 'login_admin.php';
    }
?>