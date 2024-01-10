@include('layout.header')

<body>
    <!-- Start Sidebar -->
    <div class="sidebar collapsed top-0 bottom-0 bg-white border-end" style="position: fixed;">
        <div class="d-flex align-item-center p-3">
            <a href="" class="sidebar-logo fw-bold fs-4 text-decoration-none">
                <!-- <i class="fa-brands fa-shopify fa-bounce"></i> -->
                TokoSabil
            </a>

            <i class="fa-brands fa-shopify ms-3 mt-1 fs-4 d-none d-md-block" style="color: var(--bs-indigo);"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item active">
                <a href="/">
                    <i class="fa-solid fa-house-chimney sidebar-menu-item-icon"></i>
                    Dashboard
                </a>
            </li>
            @if(Auth::User()->role == 'Admin')
            <!-- Data Master -->
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">DataMaster</li>
            <li class="sidebar-menu-item has-dropdown">
                <a href="">
                    <i class="fa-solid fa-boxes-stacked sidebar-menu-item-icon"></i>
                    DataMaster
                    <i class="arrow fa-solid fa-chevron-down ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="petugas">
                            Data Petugas
                        </a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="barang">
                            Data Barang
                        </a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="kategori">
                            Kategori
                        </a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="suplier">Data Suplier</a>
                    </li>

                </ul>
            </li>

            @endif

            @if(Auth::User()->role == 'Petugas' || Auth::User()->role == 'Admin')
            <!-- Penjualan -->
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Penjualan</li>

            <li class="sidebar-menu-item has-dropdown">
                <a href="">
                    <i class="fa-solid fa-shop sidebar-menu-item-icon"></i>
                    Penjualan
                    <i class="arrow fa-solid fa-chevron-down ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="/penjualan">Transaksi Barang</a>
                    </li>
                </ul>
            </li>
            <!-- Pembelian -->
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Pembelian</li>
            <li class="sidebar-menu-item has-dropdown">
                <a href="">
                    <i class="fa-solid fa-cart-shopping sidebar-menu-item-icon"></i>
                    Pembelian
                    <i class="arrow fa-solid fa-chevron-down ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="/pembelian">Transaksi Barang</a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Auth::User()->role == 'Admin')
            <!-- Laporan -->
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Laporan</li>
            <li class="sidebar-menu-item has-dropdown">
                <a href="">
                    <i class="fa-solid fa-check-to-slot sidebar-menu-item-icon"></i>
                    DataLaporan
                    <i class="arrow fa-solid fa-chevron-down ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="LaporanPb">Laporan Pembelian</a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="LaporanPj">Laporan Penjualan</a>
                    </li>
                </ul>
            </li>

            @endif
            @if(Auth::User()->role == 'Super Admin')
            <!-- History -->
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">History</li>
            <li class="sidebar-menu-item has-dropdown">
                <a href="">
                    <i class="fa-solid fa-check-to-slot sidebar-menu-item-icon"></i>
                    DataHistory
                    <i class="arrow fa-solid fa-chevron-down ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="History">Data History
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">MenuHak</li>
            <li class="sidebar-menu-item has-dropdown">
                <a href="">
                    <i class="fa-solid fa-lock sidebar-menu-item-icon"></i>HakAkses
                    <i class="arrow fa-solid fa-chevron-down ms-auto"></i>

                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="hakakses">Akses Login</a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </div>

    <!-- End Sidebar -->
    <!-- Start Main -->
    <main class="main collapsed bg-light">
        <div class="p-2">
            <!-- Start Nav -->
            <nav class="px-3 py-2 bg-white rounded-md shadow">
                <i class="fa-solid fa-bars sidebar-toggle"></i>
                <h5 class="mb-0 ms-5 hallo">Hallo {{auth()->user()->nama_petugas}} Selamat Datang</h5>
                <button type="button" style="border: none;background-color: white; margin-left: 55%;font-size: 20px;" data-bs-toggle="modal" data-bs-target="#Bell">
                    <i class="fa-solid fa-bell bell"></i>
                </button>
                @if($pesan)
                <span style="background-color: red;color: white; border: 1px solid red; font-size: 10px;border-radius: 50%;width: 17px;height: 17px; display: flex;justify-content: center;align-items: center; margin-bottom: 10px;left: 0;padding:10px;">{{$pesan}}</span>
                @endif
                <i class="fa-regular fa-comment comment" style="font-size: 20px;margin-left:2%;"></i>
                <div class="dropdown ms-auto profil">
                    <div class="d-flex align-item-center cursor-pointer dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="mt-2 me-3">{{ auth()->user()->nama_petugas}}</span>
                        <img class="navbar-profile-image " src="img/photo.jpg">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Nav -->

            <div class="modal fade" id="Bell" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Info Barang</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-light table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barang as $data)
                                    <?php $no = 1; ?>
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$data->id_barang}}</td>
                                        <td>{{$data->nama_barang}}</td>
                                        <td>{{$data->stok}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Content -->

        <div class="p-2 bg-white m-2 shadow" id="content">
            @if(session('info'))
            <div class="alert alert-info">{{session('info')}}</div>
            @endif

            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif

            @if(session('danger'))
            <div class="alert alert-danger">
                {{session('danger')}}
            </div>
            @endif

            @yield('content')
          
        </div>
        <!-- End Content -->
    </main>
    <!-- End Main -->
    @include('layout.fotter')