<?php 


	$page = $_GET['page'];
	$aksi = $_GET['aksi'];

	if ($page == "pelanggan") {
		if ($aksi == "") {
			include "page/pelanggan/pelanggan.php";
		}else if($aksi == "tambah") {
			include "page/pelanggan/tambah.php";
		}else if($aksi == "edit") {
			include "page/pelanggan/edit.php";
		}
		else if($aksi == "hapus") {
			include "page/pelanggan/hapus.php";
		}
	}else if ($page == "transaksi") {
		if ($aksi == "") {
			include "page/transaksi/transaksi.php";
		}else if($aksi == "pemasukan") {
			include "page/transaksi/pemasukan.php";
		}else if($aksi == "pengeluaran") {
			include "page/transaksi/pengeluaran.php";
		}else if($aksi == "hapus") {
			include "page/transaksi/hapus.php";
		}else if($aksi == "bayar") {
			include "page/transaksi/bayar.php";
		}
	}else if ($page == "laporan") {
		if ($aksi == "") {
			include "page/laporan/laporan.php";
		}else if($aksi == "hapus") {
			include "page/laporan/hapus.php";
		}else if($aksi == "pemasukan") {
			include "page/laporan/pemasukan.php";
		}else if($aksi == "pengeluaran") {
			include "page/laporan/pengeluaran.php";
		}
	}else if ($page == "user") {
		if ($aksi == "") {
			include "page/user/user.php";
		}else if($aksi == "tambah") {
			include "page/user/tambah.php";
		}else if($aksi == "edit") {
			include "page/user/edit.php";
		}else if($aksi == "hapus") {
			include "page/user/hapus.php";
		}
	}else if ($page == "status") {
		if ($aksi == "") {
			include "page/status/status.php";
		}else if($aksi == "tambah") {
			include "page/status/tambah.php";
		}else if($aksi == "edit") {
			include "page/status/edit.php";
		}else if($aksi == "hapus") {
			include "page/status/hapus.php";
		}
	}else if($page == "profile") {
		if($aksi == "") {
			include "page/profile/profile.php";
		}else if($aksi == "edit") {
			include "page/profile/edit.php";
		}
	}else{
		include "dashboard.php";
	}