<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="row">
        <div class="col-lg">
            <div style="width: 40%">
                <?= $this->session->flashdata('message'); ?>
                <?= form_error('menu_id', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('title', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('url', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('icon', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('is_active', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            </div>

            <a href="" class="btn btn-primary mb-3 btnAddSubmenu" data-toggle="modal" data-target="#modalSubmenu"> Add New Submenu </a>

            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Title</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Is Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dataSubmenu as $sm) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td class="text-capitalize"><?= $sm['menu'] ?></td>
                            <td class="text-capitalize"><?= $sm['title'] ?></td>
                            <td><?= $sm['url'] ?></td>
                            <td><?= $sm['icon'] ?></td>
                            <td><?= $sm['is_active'] ?></td>
                            <td>
                                <a href="#" class="badge badge-success btnEditSubmenu" data-toggle="modal" data-target="#modalSubmenu" data-id="<?= $sm['id']; ?>"> Edit </a>
                                <a href="#" class="badge badge-danger btnDeleteSubmenu" data-toggle="modal" data-target="#modalSubmenu" data-id="<?= $sm['id']; ?>"> Delete </a>
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
<div class="modal fade" id="modalSubmenu" tabindex="-1" role="dialog" aria-labelledby="modalSubmenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSubmenuLabel">Add New Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <input type="hidden" id="id" name="id">
                <div class="modal-body">
                    <label class="confirmation" hidden>Are you sure want delete this submenu?</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="menu_id" id="menu_id">
                            <option value="">- Select Menu -</option>
                            <?php foreach ($dataMenu as $dm) : ?>
                                <option value="<?= $dm['id'] ?>" class="text-capitalize"><?= $dm['menu'] ?></option>
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
                        <select name="is_active" id="is_active" class="custom-select">
                            <option value="1"> Active </option>
                            <option value="0"> Not Active </option>
                        </select>
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