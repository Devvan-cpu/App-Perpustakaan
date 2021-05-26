<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="sidebar-brand-text mx-3">App Perpus</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard Admin</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>admin/anggota">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Anggota</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-address-book"></i>
                    <span>Data Buku</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Master Buku:</h6>
                        <a class="collapse-item" href="<?= base_url() ?>admin/pengarang">Pengarang</a>
                        <a class="collapse-item" href="<?= base_url() ?>admin/penerbit">Penerbit</a>
                        <a class="collapse-item" href="<?= base_url() ?>admin/buku">Buku</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Transaksi</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Transaksi:</h6>
                        <a class="collapse-item" href="<?= base_url() ?>admin/pinjam">Data Pinjaman</a>
                        <a class="collapse-item" href="<?= base_url() ?>admin/pegembalian">Data Pengembalian</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h3 class="h3 mb-4 text-gray-800">Form Tambah Penerbit</h3>
                    <div class="col-lg-10">
                        <form action="<?= base_url('admin/insert_buku') ?>" method="POST">
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">No Buku</label>
                                <div class="col-sm-10">
                                    <input type="text" name="id_buku" value="<?= $id_buku; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Judul Buku</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="judul_buku" name="judul_buku">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 control-label">Pengarang</label>
                                <div class="col-sm-10">
                                    <select name="id_pengarang" class="form-control select2">
                                        <option value=""> - Pilih Pengarang - </option>
                                        <?php
                                        foreach ($pengarang as $row) { ?>
                                            <option value="<?= $row->id_pengarang; ?>"><?= $row->name_pengarang; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 control-label">Penerbit</label>
                                <div class="col-sm-10">
                                    <select name="id_penerbit" class="form-control select2">
                                        <option value=""> - Pilih Penerbit - </option>
                                        <?php
                                        foreach ($penerbit as $row) { ?>
                                            <option value="<?= $row->id_penerbit; ?>"><?= $row->name_penerbit; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 control-label">Tahun Terbit</label>
                                <div class="col-sm-10">
                                    <select name="tahun_terbit" class="form-control select2">
                                        <option value=""> - Pilih Tahun - </option>
                                        <?php
                                        for ($tahun = 2009; $tahun <= 2021; $tahun++) { ?>
                                            <option value="<?= $tahun ?>"><?= $tahun; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Jumlah Buku</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="jumlah" name="jumlah">
                                </div>
                            </div>

                            <div class="box-footer">
                                <a href="<?= base_url() ?>admin/buku" class="btn btn-warning">Cancel</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright AdminLTE 2 - SB Admin 2 - Bootstrap 4 Your Website &copy;2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url() ?>auth/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>