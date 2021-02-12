<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Wisata</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="card-body">
                            <div id="map" style="height: 350px;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <?php echo session()->getFlashdata('error'); ?>
                                <?php endif; ?>

                                <form role="form" method="post" action="">
                                    <div class="form-group">
                                        <label>Nama Wisata</label>
                                        <input class="form-control" name="BANGUNAN_NAMA" value="<?php echo $wisata['BANGUNAN_NAMA'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input class="form-control" name="BANGUNAN_LATITUDE" id="BANGUNAN_LATITUDE" value="<?php echo $wisata['BANGUNAN_LAT'] ?>" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label>Longtitude</label>
                                        <input class="form-control" name="BANGUNAN_LONGTITUDE" id="BANGUNAN_LONGTITUDE" value="<?php echo $wisata['BANGUNAN_LONG'] ?>" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control" name="BANGUNAN_DESKRIPSI" rows="10" value=""><?php echo $wisata['BANGUNAN_DESKRIPSI'] ?></textarea>
                                    </div>  
                                    <button type="submit" class="btn btn-default">Simpan</button>
                                    <a href="<?php echo base_url('/admin/wisata/') ?>" type="reset" class="btn btn-default">Batal</a>
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


<script type="text/javascript">
    
    var map = L.map('map').setView([-7.25656, 112.73166], 13);
    var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
    var datawisata = <?php echo json_encode($wisata) ?>;
    
    // add map
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // add marker
    var wisata = L.marker([datawisata.BANGUNAN_LAT, datawisata.BANGUNAN_LONG], {draggable: 'true', autoPan: 'true'}).addTo(map);
    wisata.bindPopup('Drag ke lokasi wisata <br>'+ wisata.getLatLng()).openPopup();

    // setviewmap 
    map.flyTo([datawisata.BANGUNAN_LAT, datawisata.BANGUNAN_LONG], 13, {
        animate: true,
        duration: 0.9,
    }); 
    
    // set drag marker
    wisata.on("drag", function(e) {
        console.log(wisata.getLatLng().lat);
        $('#BANGUNAN_LATITUDE').val(wisata.getLatLng().lat.toFixed(5));
        $('#BANGUNAN_LONGTITUDE').val(wisata.getLatLng().lng.toFixed(5));
        wisata.bindPopup('Drag ke lokasi anda <br>'+ wisata.getLatLng()).openPopup();
    });

</script>