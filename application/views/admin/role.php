<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <a href="" class="btn btn-primary mb-3 btnAddRole" data-toggle="modal" data-target="#modalRole"> Add New User Role </a>

            <table class="table table-hover table-bordered text-capitalize">
                <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $r['role'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning"> Access </a>
                                <a href="#" class="badge badge-success btnEditRole" data-toggle="modal" data-target="#modalRole" data-id="<?= $r['id']; ?>"> Edit </a>
                                <a href="#" class="badge badge-danger btnDeleteRole" data-toggle="modal" data-target="#modalRole" data-id="<?= $r['id']; ?>"> Delete </a>
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
<div class="modal fade" id="modalRole" tabindex="-1" role="dialog" aria-labelledby="modalRoleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRoleLabel">Add New User Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <input type="hidden" id="id" name="id">
                <div class="modal-body">
                    <label class="confirmation" hidden>Are you sure want delete this user role?</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="User Role">
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