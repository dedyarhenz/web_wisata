<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Image Wisata</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <?php if(!empty(session()->getFlashdata('warning'))){ ?>
                <div class="alert alert-warning">
                    <?php echo session()->getFlashdata('warning');?>
                </div>
                <?php } ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="<?php echo base_url('admin/wisataimage/create/' . $wisata_id) ?>" type="button" class="btn btn-primary">Tambah</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama Wisata</th>
                                        <th>Latitude</th>
                                        <th>Longtitude</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($wisata as $key => $value): ?>
                                        <tr>
                                            <td><?php echo $value['BANGUNAN_NAMA'] ?></td>
                                            <td><?php echo $value['BANGUNAN_LAT'] ?></td>
                                            <td><?php echo $value['BANGUNAN_LONG'] ?></td>
                                            <td class="center"><?php echo $value['BANGUNAN_DESKRIPSI'] ?></td>
                                            <td class="center">
                                                <a href="<?php echo base_url('admin/wisata/update/' . $value['BANGUNAN_ID']) ?>" type="button" class="btn btn-warning">Ubah</a>
                                                <a href="<?php echo base_url('admin/wisata/delete/'  . $value['BANGUNAN_ID']) ?>" type="button" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->