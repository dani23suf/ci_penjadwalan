<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class=" col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">

                                <?= $this->session->flashdata('message'); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<script>
setInterval(function() {
    <?php
        $this->session->sess_destroy();
        ?>
    window.location.href = "<?= base_url('auth'); ?>"
}, 1500);
</script>