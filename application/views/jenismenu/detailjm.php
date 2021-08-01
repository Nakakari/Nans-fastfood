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
                                <th scope="col">ID Menu</th>
                                <th scope="col">Nama Menu</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($query as $row) { ?>
                                <tr>
                                    <td><?= $row['id_menu']; ?></td>
                                    <td><?= $row['jenis_menu']; ?></td>
                                    <td><?= $row['ket']; ?></td>
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