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

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Agenda</th>
                            <th>Tempat</th>
                            <th>Anggota Yang Datang</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            <th>Foto Bukti</th>
                            <th>Upload Bukti Datang</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>

                        <?php foreach ($anggotadatang as $j) :  ?>
                        <?php

                            $j = (object)$j;
                            ?>
                        <tr>
                            <td><?= $j->tanggal; ?></td>
                            <td><?= $j->jam; ?></td>
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
                                <div class="form-group">
                                    <div class="form-check">
                                        <?php if ($j->status_id == 1) { ?>

                                        <?php

                                                $where_array = array(
                                                    'id_user' => $user['id'],
                                                    'id_jadwal' => $j->id_jadwal
                                                );
                                                $query = $this->db->get_where('tbl_anggotadatang', $where_array)->row_array();

                                                ?>
                                        <?php if ($query) { ?>


                                        <button class="btn btn-danger" type="submit"
                                            onclick="batal_join(<?= $j->id_jadwal; ?>)" id="myButton"
                                            value="<?= $j->id_jadwal; ?>" name="submit">Batal</button>

                                        <?php } else { ?>

                                        <button class="btn btn-success" type="submit" id="myButton"
                                            onclick="join(<?= $j->id_jadwal; ?>)" data-id="<?= $j->id_jadwal; ?>"
                                            name="submit" id="join">Join</button>
                                        <?php } ?>
                                        <?php } else { ?>
                                        <button class="btn btn-success" type="submit" disabled>Join</button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php if ($j->foto_bukti) { ?>

                                <div class="text-center">
                                    <img alt="Belum Upload" style="
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 50px;
" src="<?= base_url('assets/img/uploadBukti/') . $j->foto_bukti ?>">
                                    <?php } else {
                                    } ?>
                                </div>
                            </td>
                            <td><?php if ($j->status_id == 1 && $user['role_id'] == 3) { ?>
                                <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#ModalEdit<?= $j->id_jadwal; ?>">Upload
                                    Bukti</button>
                                <?php } else { ?>
                                <button class="btn btn-primary" disabled data-toggle="modal"
                                    data-target="#ModalEdit<?= $j->id_jadwal; ?>">Upload
                                    Bukti</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php $i++; ?>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="ModalEdit<?= $j->id_jadwal; ?>" tabindex="-1"
                            aria-labelledby="ModalEdit" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalEdit">Upload Bukti</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="form-group row">

                                        <div class="col-sm-10">
                                            <div class="row">
                                                <?= form_open_multipart('tugas/uploadBukti'); ?>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="hidden" name="id_jadwal" id="id_jadwal"
                                                            value="<?= $j->id_jadwal; ?>">
                                                        <input type="text" name="id" id="id"
                                                            value="<?= $j->id_jadwal; ?>">
                                                        <input type="file" class="custom-file-input" id="image"
                                                            name="image">
                                                        <label class="custom-file-label" for="image">Choose
                                                            file</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

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
function join(id) {
    //saya punya variable menuId diisi dgn $this dan ambil data yang namanya menu

    $.ajax({
        url: "<?= base_url('tugas/anggotaJoin'); ?>",
        type: 'post',
        data: {

            idJadwal: id

        },
        success: function() {
            document.location.href =
                "<?= base_url('tugas/daftartugasmember/'); ?>";

        }
    })
};

function batal_join(id) {
    //saya punya variable menuId diisi dgn $this dan ambil data yang namanya menu

    $.ajax({
        url: "<?= base_url('tugas/anggotabatalJoin'); ?>",
        type: 'post',
        data: {

            idJadwal: id

        },
        success: function() {
            document.location.href =
                "<?= base_url('tugas/daftartugasmember'); ?>";

        }
    })
};
</script>