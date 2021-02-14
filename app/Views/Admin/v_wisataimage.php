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
                    <img src="">
                    <div class="panel-heading">
                        <a href="<?php echo base_url('admin/wisataimage/create/' . $wisata_id) ?>" type="button" class="btn btn-primary">Tambah</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($wisata as $key => $value): ?>
                                        <tr>
                                            <td><?php echo $value['ID_GAMBAR']; ?></td>
                                            <td><img height="100" src="<?php echo base_url() . '/uploads/wisata/' . $value['NAMA_GAMBAR'] ?>"></td>
                                            <td><a href="<?php echo base_url('admin/wisataimage/delete/' . $wisata_id . '/' . $value['ID_GAMBAR']) ?>" type="button" class="btn btn-danger">Hapus</a></td>
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