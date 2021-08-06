
            <div class="col-md-6 offset-md-3">

                

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img src="assets/img/user/<?= $gambar; ?>" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                        </div>

                        <br>
                        <p class="text-center">Anda Login Sebagai</p>
                        <p class="text-muted text-center"><?= $level ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Username</b> <a class="float-right"><?= $username ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Nama</b> <a class="float-right"><?= $nama ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Level</b> <a class="float-right"><?= $level ?></a>
                            </li>
                        </ul>

                        <a href="?page=profile&aksi=edit&id=<?= $id_user ?>" class="btn btn-primary btn-block"><b>Edit</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
        

