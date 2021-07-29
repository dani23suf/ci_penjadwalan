<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <div class="col-lg-5">
                <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
                <?php endif; ?>
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                <?php if ($this->session->flashdata('message')) : ?>
                <div>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <?php $this->session->unset_userdata('message'); ?>
                <?php endif ?>
            </div>
            <a href="" class=" btn btn-primary mb-3" data-toggle="modal" data-target="#NewSubModal">Add New
                Submenu</a>

            <table class=" table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sub Menu</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($Submenu as $sm) :  ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $sm['title']; ?></td>
                        <td><?= $sm['menu']; ?></td>
                        <td><?= $sm['url']; ?></td>
                        <td><?= $sm['icon']; ?></td>
                        <td><?= $sm['is_active']; ?></td>
                        <td>
                            <a href="" class="badge badge-success " data-toggle="modal"
                                data-target="#editSubMenu<?= $sm['id']; ?>" onclick="Edit(<?= $sm['id']; ?>)">edit</a>
                            ||
                            <a href="<?= base_url(); ?>menu/hapusSubMenu/<?= $sm['id']; ?>" class="badge badge-danger"
                                onclick="return confirm('Do you want to delete this ?')">deleted</a>
                        </td>

                        <!-- Edit Modal -->

                    </tr>
                    <?php $i++; ?>

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
<div class="modal fade" id="NewSubModal" tabindex="-1" aria-labelledby="NewSubModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewSubModal">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active"
                                checked>
                            <label class="form-check-label" for="is_active">
                                Active ?
                            </label>
                        </div>
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

<!-- Modal Edit -->
<?php $NO = 0; ?>
<?php foreach ($Submenu as $sm) : $NO++; ?>
<div class="modal fade" id="editSubMenu<?= $sm['id'] ?>" tabindex="-1" aria-labelledby="editSubMenu" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubMenu">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('menu/edit_submenu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Sub Menu Title : </label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $sm['title']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="status_agenda">Menu : </label>
                        <select name="menu_id" id="menu_id" class="form-control">

                            <?php foreach ($menu as $m) : ?>
                            <?php
                                    echo '<option  value="' . $m['id'] . '"';
                                    if ($m['id'] == $sm['menu_id']) {
                                        echo 'selected';
                                    }
                                    echo '>' . $m['menu'] . '</option>';
                                    ?>

                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Url : </label>
                        <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="title">Icon: </label>
                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon']; ?>">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active"
                                checked>
                            <label class="form-check-label" for="is_active">
                                Active ?
                            </label>
                        </div>
                    </div>
                    <input type="hidden" id="edit_id" name="edit_id" value="<?= $sm['id']; ?>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>