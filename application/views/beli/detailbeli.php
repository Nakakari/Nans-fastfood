<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Food</li>
            <li class="active">List Makanan</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Daftar Makanan</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">


        <div class="col-md-6">

        </div>
        <!--/.col-->
    </div>

    <table class="table">

        <a type="button" class="btn btn-md btn-warning" href="<?php echo base_url('/makanan/'); ?>">Kembali</br></a>

    </table>

    <body>
        <div class="panel panel-default">
            <div class="panel-body tabs">


                <table class="table">
                    <div class="col-md-6">
                        <thead>
                            <tr>
                                <th scope="col">ID Pembelian</th>
                                <th scope="col">Nama Pembeli</th>
                                <th scope="col">Menu Dibeli</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">Jumlah Beli</th>
                                <th scope="col">Uang Bayar</th>
                                <th scope="col">Kembalian</th>
                                <th scope="col">Tanggal Transaksi</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($query as $row) { ?>
                                <tr>
                                    <td><?= $row['id_beli']; ?></td>
                                    <td><?= $row['nama_pem']; ?></td>
                                    <td>
                                        <?= $row['nama']; ?>
                                    </td>
                                    <td><?= $row['harga']; ?></td>
                                    <td><?= $row['jumlah']; ?></td>
                                    <td><?= $row['bayar']; ?></td>
                                    <td>
                                        <?php
                                        $duit       = $row['harga'];
                                        $jml        = $row['jumlah'];
                                        $mbayar     = $row['bayar'];
                                        $totalbyr   = $duit * $jml;
                                        $susuk      = $mbayar - $totalbyr;
                                        echo $susuk;
                                        ?>
                                    </td>
                                    <td><?= $row['waktu']; ?></td>
                                    <td><?= $row['ket_pesan']; ?></td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </div>
                </table>

            </div>
        </div>

</div>
</div>
</body>