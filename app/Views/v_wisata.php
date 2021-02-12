<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Wisata</h1>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo $wisata_only['BANGUNAN_NAMA'] ?>
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                          <img src="<?php echo base_url('/public/uploads/wisata/foto_sunan_giri.png') ?>" class="rounded" alt="...">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        LOKASI WISATA <?php echo $wisata_only['BANGUNAN_NAMA'] ?>
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <div id="map" style="height: 350px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        DESKRIPSI <?php echo $wisata_only['BANGUNAN_NAMA']; ?>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $wisata_only['BANGUNAN_DESKRIPSI'] ?>.</p>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<script type="text/javascript">
    
    var map = L.map('map').setView([-7.25656, 112.73166], 13);
    var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
    var datawisata = <?php echo json_encode($wisata_only) ?>;
        
    console.log(datawisata.BANGUNAN_LAT)

    // add map
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // add marker
    var wisata = L.marker([datawisata.BANGUNAN_LAT, datawisata.BANGUNAN_LONG]).addTo(map);
    wisata.bindPopup('lokasi wisata <br>'+ wisata.getLatLng()).openPopup();

    // setviewmap 
    map.flyTo([datawisata.BANGUNAN_LAT, datawisata.BANGUNAN_LONG], 13, {
        animate: true,
        duration: 0.9,
    }); 

</script>