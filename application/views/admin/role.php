<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?php if ($this->session->flashdata('message')) : ?>
            <?= $this->session->flashdata('message'); ?>
            <?php endif; ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modaladdrole">Add New Role
                Menu</a>

            <table class=" table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) :  ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $r['role']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>"
                                class="badge badge-warning">access</a> ||
                            <a href="" class="badge badge-success" data-toggle="modal"
                                data-target="#NewEditRole<?= $r['id']; ?>">edit</a> ||
                            <a href="<?= base_url(); ?>admin/hapusRole/<?= $r['id']; ?> " class=" badge
                                badge-danger" onclick="return confirm('Do you want to delete this ?')">deleted</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <!-- Modal Edit Status-->
                    <div class="modal fade" id="NewEditRole<?= $r['id']; ?>" tabindex="-1" aria-labelledby="NewEditRole"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="NewEditRole">Change Status</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/editRole'); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="roleid" id="roleid"
                                                value="<?= $r['role']; ?>">
                                            </select>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" class="form-control" value="<?= $r['id'] ?>" id="id"
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
<div class="modal fade" id="modaladdrole" tabindex="-1" aria-labelledby="modaladdrole" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaladdrole">Add New Role Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php base_url('admin/addRole'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="rolename" name="rolename" placeholder="Role Name">
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