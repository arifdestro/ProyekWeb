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
            <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-table"></i>
            Laporan Admin</div>
            <div><a class="btn btn-primary" href="cetak_admin.php" role="button">Cetak</a></div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead class="thead-dark">
			<tr>
                <th>No.</th>
				<th>ID ADMIN</th>
				<th>NAMA ADMIN</th>
            </tr>
            </thead>
			<tbody>
            <?php
				$result = mysqli_query(
                    $koneksi,
                    "SELECT admin.ID_ADMIN, admin.NAMA_ADMIN
                    FROM admin
                    ");

                if(mysqli_num_rows($result) > 0){
                    //membuat variabel $no untuk menyimpan nomor urut
                    $no = 1;
                    //melakukan perulangan while dengan dari dari query $sql
                    while($data = mysqli_fetch_assoc($result)){
                        //menampilkan data perulangan
                        echo '
                        <tr>
                            <td>'.$no.'</td>
                            <td>'.$data['ID_ADMIN'].'</td>
                            <td>'.$data['NAMA_ADMIN'].'</td>
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