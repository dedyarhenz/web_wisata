<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Image Wisata</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" method="post" action="<?php echo base_url('/admin/wisataimage/create/' . $wisata_id) ?>">
                                    <div class="form-group" method="post" enctype="multipart/form-data">
                                        <label for="gambar">Gambar Wisata</label>
                                        <input type="file" class="form-control-file" id="gambar" name="file_upload">
                                    </div>
                                    <button type="submit" class="btn btn-default">Simpan</button>
                                    <a type="reset" class="btn btn-default" href="<?php echo base_url('/admin/wisataimage/' . $wisata_id) ?>">Batal</a>
                                </form>
                            </div>
                        </div>
                        <!-- /.row (nested) -->
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