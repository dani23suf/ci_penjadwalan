<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?php if ($this->session->flashdata('message')) : ?>
            <div>
                <?php echo $this->session->flashdata('message'); ?>
            </div>
            <?php $this->session->unset_userdata('message'); ?>
            <?php endif ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modaladdinstansi">Tambah Instansi
                Baru
            </a>

            <table class=" table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Instansi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($instansi as $ins) :  ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $ins['nama_instansi']; ?></td>
                        <td>

                            <a href="" class="badge badge-success" data-toggle="modal"
                                data-target="#NewEditInstansi<?= $ins['id']; ?>">edit</a> ||
                            <a href="<?= base_url(); ?>admin/hapusInstansi/<?= $ins['id']; ?> " class=" badge
                                badge-danger" onclick="return confirm('Do you want to delete this ?')">deleted</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <!-- Modal Edit Status-->
                    <div class="modal fade" id="NewEditInstansi<?= $ins['id']; ?>" tabindex="-1"
                        aria-labelledby="NewEditInstansi" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="NewEditInstansi">Edit Instansi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/editInstansi'); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nama_instansi"
                                                id="nama_instansi" value="<?= $ins['nama_instansi']; ?>">
                                            </select>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" class="form-control" value="<?= $ins['id'] ?>" id="id"
                                            name="id">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Edit</button>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="modaladdinstansi" tabindex="-1" aria-labelledby="modaladdinstansi" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaladdinstansi">Tambah Instansi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/addInstansi'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="instansi" name="instansi"
                            placeholder="Nama Instansi">
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