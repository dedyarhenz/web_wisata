<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pemetaan</h1>
                
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="card-body">
                            <div id="mapid" style="height: 500px;"></div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" method="post">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="wisata_awal">Wisata Awal</label>
                                                <select class="form-control" id="wisata_awal" onchange="getWisataAwal()">
                                                    <option selected>Pilih</option>
                                                    <?php foreach ($wisata as $key => $value): ?>
                                                        <option value="<?php echo $value['BANGUNAN_ID']?>"><?php echo $value['BANGUNAN_NAMA'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="wisata_akhir">Wisata Akhir</label>
                                                <select class="form-control" id="wisata_akhir" onchange="getWisataAkhir()">
                                                    <option selected>Pilih</option>
                                                    <?php foreach ($wisata as $key => $value): ?>
                                                        <option value="<?php echo $value['BANGUNAN_ID']?>"><?php echo $value['BANGUNAN_NAMA'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn btn-default" onclick="navigasi()">Navigasi</a>
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




<script>
var map = L.map('mapid').setView([-7.25656, 112.73166], 13);
var datawisata = <?php echo json_encode($wisata) ?>;
var baseUrlWisata = <?php echo json_encode(base_url()) ?> + '/wisata/show/';
var wisataAwal;
var wisataAkhir;
var routingPlan;

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

function getWisataAwal(){
    wisataAwal = datawisata.find(function (element) { 
        return element.BANGUNAN_ID ==  $('#wisata_awal').val(); 
    });
}

function getWisataAkhir(){
    wisataAkhir = datawisata.find(function (element) { 
        return element.BANGUNAN_ID ==  $('#wisata_akhir').val(); 
    });
}

function navigasi() {
    if (wisataAwal == undefined || wisataAkhir == undefined) {
        alert('Isi wisata awal dan wisata akhir');
    }else{
        if (routingPlan != undefined) {
            routingPlan.setWaypoints([]);
        }

        var wpAwal = L.Routing.waypoint(L.latLng(wisataAwal.BANGUNAN_LAT, wisataAwal.BANGUNAN_LONG), wisataAwal.BANGUNAN_ID + '_' +wisataAwal.BANGUNAN_NAMA);
        var wpAkhir = L.Routing.waypoint(L.latLng(wisataAkhir.BANGUNAN_LAT, wisataAkhir.BANGUNAN_LONG), wisataAkhir.BANGUNAN_ID + '_' + wisataAkhir.BANGUNAN_NAMA);
        var waypoints = [wpAwal, wpAkhir];

        routingPlan = L.Routing.control({
            plan: L.Routing.plan(waypoints, {
                createMarker: function(i, wp) {
                    if(waypoints[0]) {
                        let bangunan = wp.name;
                        let id = bangunan.split("_")[0];
                        let nama = bangunan.split("_")[1];

                        let button = '<br><br><a href="'+ baseUrlWisata + id + '" class="btn btn-default" >Detail</a>';

                        return L.marker(wp.latLng, {
                            draggable: false
                        }).bindPopup(nama + button).openPopup();
                    }

                },
            routeWhileDragging: false
          })
        }).addTo(map);
    }
}






</script>