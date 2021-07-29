<link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">

<div class="container-fluid">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Add Account</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('admin/tambahanggota'); ?>">

                            <div class="form-group">
                                <input type="text" id="name" class="form-control form-control-user" name="name"
                                    placeholder="Full name" value="<?= set_value('name');  ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" id="email" name="email" class="form-control form-control-user"
                                    placeholder="Email Address" value="<?= set_value('email');  ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <select name="jobdesk" id="jobdesk" class="form-control">
                                    <option value="">Select Jobdesk</option>
                                    <?php foreach ($role as $r) : ?>
                                    <option class="custom-file-label" value="<?= $r['id']; ?>"><?= $r['role']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('jobdesk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1"
                                        name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" name="password2"
                                        id="password2" placeholder="Repeat Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Add Account
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<script>
$('.form-controlform-control-user').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);

});
</script>