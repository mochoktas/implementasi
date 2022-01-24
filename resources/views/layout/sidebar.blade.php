        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="assets/images/logo.svg" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        <li class='sidebar-title'>Main Menu</li>



                        <li class="sidebar-item {{request ()->is('/blank') ? 'active' :'' }}">
                            <a href="/blank" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>

                        </li>




                        <li class="sidebar-item {{request ()->is('customer')||request ()->is('tambah_customer_1') ? 'active' :'' }}  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="smile" width="20"></i>
                                <span>Customer</span>
                            </a>

                            <ul class="submenu {{request ()->is('customer')||request ()->is('tambah_customer_1') ? 'active' :'' }}">
                            <!-- <ul class=submenu active"> -->

                                <li  class="submenu-item {{request ()->is('customer') ? 'active' :'' }}">
                                    <a href="/customer">DataCustomer</a>
                                </li>

                                <li class="submenu-item {{request ()->is('tambah_customer_1') ? 'active' :'' }}">
                                    <a href="/tambah_customer_1">Tambah Customer 1</a>
                                </li>

                                

                            </ul>

                        </li>

                        <li class="sidebar-item {{request ()->is('barang')||request ()->is('scan_barcode') ? 'active' :'' }}  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="package" width="20"></i>
                                <span>Barang</span>
                            </a>

                            <ul class="submenu {{request ()->is('barang')||request ()->is('scan_barcode') ? 'active' :'' }}">
                            <!-- <ul class=submenu active"> -->

                                <li  class="submenu-item {{request ()->is('barang') ? 'active' :'' }}">
                                    <a href="/barang">Data Barang</a>
                                </li>
                                <li  class="submenu-item {{request ()->is('scan_barcode') ? 'active' :'' }}">
                                    <a href="/scan_barcode">Scan Barcode Barang</a>
                                </li>
                            </ul>

                        </li>
                        <li class="sidebar-item {{request ()->is('toko')||request ()->is('scan_toko') ? 'active' :'' }}  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="map-pin" width="20"></i>
                                <span>Kunjungan Toko</span>
                            </a>

                            <ul class="submenu {{request ()->is('toko')||request ()->is('scan_toko') ? 'active' :'' }}">
                            

                                <li  class="submenu-item {{request ()->is('toko') ? 'active' :'' }}">
                                    <a href="/toko">Toko</a>
                                </li>
                                <li  class="submenu-item {{request ()->is('scan_toko') ? 'active' :'' }}">
                                    <a href="/scan_toko">Scan Barcode Toko</a>
                                </li>
                            </ul>

                        </li>

                        <li class="sidebar-item {{request ()->is('excel') ? 'active' :'' }}  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="columns" width="20"></i>
                                <span>Excel</span>
                            </a>

                            <ul class="submenu {{request ()->is('excel') ? 'active' :'' }}">
                            

                                <li  class="submenu-item {{request ()->is('excel') ? 'active' :'' }}">
                                    <a href="/excel">Customer</a>
                                </li>
                                
                            </ul>

                        </li>

                        <li class="sidebar-item {{request ()->is('sseview')||request ()->is('console') ? 'active' :'' }}  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="clipboard" width="20"></i>
                                <span>Antrian</span>
                            </a>

                            <ul class="submenu {{request ()->is('sseview')||request ()->is('console') ? 'active' :'' }}">
                            

                                <li  class="submenu-item {{request ()->is('sseview') ? 'active' :'' }}">
                                    <a href="/sseview">SSE</a>
                                </li>
                                <li  class="submenu-item {{request ()->is('console') ? 'active' :'' }}">
                                    <a href="/console">Console</a>
                                </li>
                            </ul>

                        </li>

                        <li class="sidebar-item {{request ()->is('scoreboard-view')||request ()->is('scoreboard-console') ? 'active' :'' }}  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="clipboard" width="20"></i>
                                <span>Scoreboard</span>
                            </a>

                            <ul class="submenu {{request ()->is('scoreboard-view')||request ()->is('scoreboard-console') ? 'active' :'' }}">
                            

                                <li  class="submenu-item {{request ()->is('scoreboard-view') ? 'active' :'' }}">
                                    <a href="/scoreboard-view">SSE</a>
                                </li>
                                <li  class="submenu-item {{request ()->is('scoreboard-console') ? 'active' :'' }}">
                                    <a href="/scoreboard-console">Console</a>
                                </li>
                            </ul>

                        </li>

                        



                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>