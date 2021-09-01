<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <a href="" class="btn btn-primary mb-3 btnAddMenu" data-toggle="modal" data-target="#modalMenu"> Add New Menu </a>

            <table class="table table-hover table-bordered text-capitalize">
                <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dataMenu as $dm) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $dm['menu'] ?></td>
                            <td>
                                <a href="#" class="badge badge-success btnEditMenu" data-toggle="modal" data-target="#modalMenu" data-id="<?= $dm['id']; ?>"> Edit </a>
                                <a href="#" class="badge badge-danger btnDeleteMenu" data-toggle="modal" data-target="#modalMenu" data-id="<?= $dm['id']; ?>"> Delete </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMenuLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <input type="hidden" id="id" name="id">
                <div class="modal-body">
                    <label class="confirmation" hidden>Are you sure want delete this menu?</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>