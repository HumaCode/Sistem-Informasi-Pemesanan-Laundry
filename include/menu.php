<!-- Dashboard -->
          <li class="nav-item ">
            <a href="index.php" class="nav-link <?php 
                                                   if(!$_GET['page']) {
                                                    echo "active";
                                                   } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

<!-- pelanggan -->

          <li class="nav-item ">
            <a href="?page=pelanggan" class="nav-link  <?php 
                                                   if($_GET['page'] == "pelanggan" || $_GET['page'] == "pelanggan" && $_GET['aksi'] == "tambah" || $_GET['page'] == "pelanggan" && $_GET['aksi'] == "edit") {
                                                    echo "active";
                                                   } ?>">
              <i class="nav-icon fas fas fa-users"></i>
              <p>
                Pelanggan
              </p>
            </a>
          </li>


<!-- transaksi Laundry -->
          <li class="nav-item ">
            <a href="?page=transaksi" class="nav-link <?php 
                                                   if($_GET['page'] == "transaksi" || $_GET['page'] == "transaksi" && $_GET['aksi'] == "pemasukan" || $_GET['page'] == "transaksi" && $_GET['aksi'] == "pengeluaran") {
                                                    echo "active";
                                                   } ?>">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                Transaksi Laundry
              </p>
            </a>
          </li>

<!-- Laporan Laundry -->
          <li class="nav-item ">
            <a href="?page=laporan" class="nav-link <?php 
                                                   if($_GET['page'] == "laporan") {
                                                    echo "active";
                                                   } ?>">
              <i class="nav-icon far fa-money-bill-alt"></i>
              <p>
                Laporan Laundry
              </p>
            </a>
          </li>

<!-- Pengguna -->
<?php if($level == "Admin") { ?>
          <li class="nav-item ">
            <a href="?page=user" class="nav-link <?php 
                                                   if($_GET['page'] == "user" || $_GET['page'] == "user" && $_GET['aksi'] == "tambah" || $_GET['page'] == "user" && $_GET['aksi'] == "edit") {
                                                    echo "active";
                                                   } ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
<?php }else{ ?>

<?php } ?>
<!-- status -->
          <li class="nav-item ">
            <a href="?page=status" class="nav-link <?php 
                                                   if($_GET['page'] == "status" || $_GET['page'] == "status" && $_GET['aksi'] == "tambah" || $_GET['page'] == "status" && $_GET['aksi'] == "edit") {
                                                    echo "active";
                                                   } ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Status
              </p>
            </a>
          </li>

           <li class="nav-item">
                <a href="" class="nav-link" data-toggle="modal" data-target="#modal-logout">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
            </li>


      