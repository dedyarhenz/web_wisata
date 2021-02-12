    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                
                <li>
                    <a href="<?php echo base_url('home')?>"><i class="fa fa-dashboard fa-fw"></i>HOME</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-building fa-fw"></i>WISATA<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php foreach ($wisata as $key => $value): ?>
                            <li>
                                <a href="<?php echo base_url('wisata/show/' . $value['BANGUNAN_ID'])?>"><?php echo $value['BANGUNAN_NAMA']; ?></a>
                            </li>    
                        <?php endforeach ?>
                    </ul>
                    <!-- /.nav-second-level -->

                <li>
                    <a href="<?php echo base_url('pemetaan')?>"><i class="fa fa-globe fa-fw"></i>PEMETAAN</a>
                </li>
                <!-- <li>
                    <a href="index.html"><i class="fa fa-dashboard fa-fw"></i>ABOUT</a>
                </li> -->
                <li>
                    <a href="<?php echo base_url('admin/login')?>"><i class="fa fa-dashboard fa-fw"></i>LOGIN</a>
                </li>
                
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>