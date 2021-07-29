<!-- Custom fonts for this template -->
<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Begin   e Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?php if ($this->session->flashdata('message')) : ?>
    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>
    <?php $this->session->unset_userdata('message'); ?>
    <?php endif ?>
    <a href="" class=" btn btn-primary mb-3" data-toggle="modal" data-target="#NewJadwalModal">Tambah Agenda</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Daftar Tugas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Instansi</th>
                            <th>Agenda</th>
                            <th>Tempat</th>
                            <th>Anggota Yang Datang</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($anggotadatang as $j) :  ?>
                        <?php

                            $j = (object)$j;
                            ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $j->tanggal ?></td>
                            <td><?= $j->jam; ?></td>
                            <td><?= $j->nama_instansi; ?></td>
                            <td><?= $j->agenda; ?></td>
                            <td><?= $j->tempat; ?></td>
                            <?php $angka = 0 ?>
                            <td><?php foreach ($j->anggota as $baris) : ?>
                                <?php $angka++; ?>
                                <?= $angka . ". " . $baris->name . " (" . $baris->role . ")"; ?>
                                <br>
                                <?php endforeach; ?>
                            </td>
                            <td><?= $j->status_name; ?></td>
                            <td>
                                <a href="" class="badge badge-success" data-toggle="modal"
                                    data-target="#NewModal<?= $j->id_jadwal; ?>">Edit
                                    Status</a>
                                <br>
                                <a href="" class="badge badge-warning" data-toggle="modal"
                                    data-target="#NewSubModal<?= $j->id_jadwal; ?>">Edit Jadwal</a>
                                <br>
                                <a href="<?= base_url(); ?>admin/hapusAgenda/<?= $j->id_jadwal; ?> "
                                    class="badge badge-danger"
                                    onclick="return confirm('Do you want to delete this ?')">Deleted</a>
                            </td>
                        </tr>
                        <?php $i++; ?>

                        <!-- Modal Edit Status-->
                        <div class="modal fade" id="NewModal<?= $j->id_jadwal; ?>" tabindex="-1"
                            aria-labelledby="NewModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="NewModal">Change Status</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('admin/editStatus'); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <select name="tugas_id" id="tugas_id" class="form-control">

                                                    <?php foreach ($status as $s) : ?>

                                                    <?php
                                                            echo '<option  value="' . $s['id_status'] . '"';
                                                            if ($s['id_status'] == $j->status_id) {
                                                                echo 'selected';
                                                            }

                                                            echo '>' . $s['status_name'] . '</option>';
                                                            ?>
                                                    <?php endforeach; ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" class="form-control" value="<?= $j->id_jadwal; ?>"
                                                id="id" name="id">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END Edit Status -->


                        <!-- Modal Edit Jadwal -->

                        <div class="modal fade" id="NewSubModal<?= $j->id_jadwal; ?>" tabindex="-1"
                            aria-labelledby="NewSubModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="NewSubModal">Edit Jadwal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="<?= base_url('admin/editJadwal'); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal : </label>
                                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                    value="<?= $j->tanggal_format ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="jam">jam : </label>
                                                <input type="time" class="form-control" id="jam" name="jam"
                                                    value="<?= $j->jam ?>">
                                            </div>

                                            <div class="form-group">

                                                <label for="instansi">Instansi Agenda : </label>
                                                <select name="instansi" id="instansi" class="form-control">

                                                    <?php foreach ($instansi as $ins) : ?>

                                                    <?php
                                                            echo '<option  value="' . $ins['id'] . '"';
                                                            if ($ins['id'] == $j->id_instansi) {
                                                                echo 'selected';
                                                            }

                                                            echo '>' . $ins['nama_instansi'] . '</option>';
                                                            ?>
                                                    <?php endforeach; ?>
                                                </select>


                                            </div>

                                            <div class="form-group">
                                                <label for="agenda"> Nama Agenda : </label>
                                                <input type="text" class="form-control" id="agenda" name="agenda"
                                                    value="<?= $j->agenda ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="tempat">Tempat : </label>
                                                <input type="text" class="form-control" id="tempat" name="tempat"
                                                    value="<?= $j->tempat; ?>">
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <input type="hidden" class="form-control" value="<?= $j->id_jadwal; ?>"
                                                id="id" name="id">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- END Modal editJadwal -->

                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Modal Tambah Jadwal -->
<div class="modal fade" id="NewJadwalModal" tabindex="-1" aria-labelledby="NewJadwalModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewJadwalModal">New Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('admin/addJadwal'); ?>" method="post">

                <div class="modal-body">
                    <div class=" form-group">
                        <label for="tanggal">Tanggal : </label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="jam">jam : </label>
                        <input type="time" class="form-control" id="jam" name="jam" required>
                    </div>
                    <div class=" form-group">
                        <label for="instansi">Instansi Agenda : </label>
                        <select name="instansi" id="instansi" class="form-control" required>
                            <option value="">Pilih Instansi Agenda</option>
                            <?php foreach ($instansi as $i) : ?>
                            <option value="<?= $i['id']; ?>"><?= $i['nama_instansi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class=" form-group">
                        <label for="agenda"> Nama Agenda : </label>
                        <input type="text" class="form-control" id="agenda" name="agenda" required>
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat : </label>
                        <input type="text" class="form-control" id="tempat" name="tempat" required>
                    </div>
                    <div class=" form-group">

                        <label for="status_agenda">Status Jadwal : </label>

                        <select name="status" id="status" class="form-control" required>
                            <option value="">Pilih Status Jadwal</option>
                            <?php foreach ($status as $s) : ?>
                            <option value="<?= $s['id_status']; ?>"><?= $s['status_name'] ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </form>

        </div>
    </div>
</div>

</div>

<!-- END Modal editJadwal -->
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

<script>
$(document).ready(function() {
    $('#Table').DataTable({
        "order": [
            [0, "desc"]

        ]
    });



});
</script>