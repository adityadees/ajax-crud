    <div class="masthead clearfix">
        <div class="inner">
            <h3 class="masthead-brand"><a href="<?= base_url() ?>">APP GUDANG</a></h3>
            <nav>
                <ul class="nav masthead-nav">
                    <li  class="<?= $title == 'Dashboard' ? 'active' : ''?>"><a href="<?= base_url()?>">Dashboard</a></li>
                    <li  class="<?= $title == 'Master Barang' ? 'active' : ''?>"><a href="<?= base_url('barang')?>">Master Barang</a></li>
                    <li  class="<?= $title == 'Barang Masuk' ? 'active' : ''?>"><a href="<?= base_url('barang/masuk')?>">Barang Masuk</a></li>
                    <li  class="<?= $title == 'Barang Keluar' ? 'active' : ''?>"><a href="<?= base_url('barang/keluar')?>">Barang Keluar</a></li>
                    <li  class=""><a href="<?= base_url('logout')?>">Logout</a></li>
                </ul>
            </nav>
        </div>
    </div>