<?php

/**
 * Admin dashboard: levels page
 */
?>
<?php $this->view("admin/admin.header"); ?>

<?php if ($action === 'add') : ?>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        <?= ucfirst($action); ?>
                    </h2>
                    <form class="form-sample" method="post" enctype="multipart/form-data">
                        <p class="card-description"> Level info </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Level Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="level_name" value="<?= old_value('level_name'); ?>" placeholder="Technical Vocational Education Training" autocapitalize="on" autofocus />
                                        <?= !empty($level->getError('level_name')) ? '<span class="text-danger text-left">' . formatFieldName($level->getError('level_name')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Abbreviation</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="level_abbreviation" value="<?= old_value('level_abbreviation'); ?>" placeholder="TVET" autocapitalize="on" autofocus />
                                        <?= !empty($level->getError('level_abbreviation')) ? '<span class="text-danger text-left">' . formatFieldName($level->getError('level_abbreviation')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= ROOT; ?>/admin/levels">
                                    <button type="button" class="btn btn-danger">Cancel</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary float-lg-end me-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php else : ?>

    <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">Growth</h3>
                                <p class="text-info ms-2 mb-0 font-weight-medium">+3.5%</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-info">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Potential growth</h6>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <a href="<?= ROOT; ?>/admin/levels/add" style="text-decoration: none;">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0 text-white">Add</h3>
                                    <p class="text-success ms-2 mb-0 font-weight-medium">+</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <a href="<?= ROOT; ?>/admin/levels/add" class="text-success" style="text-decoration: none;">
                                    <span class="mdi mdi-new-box icon-item"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="<?= ROOT; ?>/admin/levels/add" style="text-decoration: none;">
                        <h6 class="text-muted font-weight-normal">New level</h6>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <a href="<?= ROOT; ?>/admin/levels/edit" style="text-decoration: none;">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0 text-white">Update</h3>
                                    <p class="text-warning ms-2 mb-0 font-weight-medium">+/-</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-warning">
                                <a href="<?= ROOT; ?>/admin/levels/edit" class="text-warning" style="text-decoration: none;">
                                    <span class="mdi mdi-contrast icon-item"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="<?= ROOT; ?>/admin/levels/edit" style="text-decoration: none;">
                        <h6 class="text-muted font-weight-normal">Change details</h6>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <a href="<?= ROOT; ?>/admin/levels/delete" style="text-decoration: none;">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0 text-white">Delete</h3>
                                    <p class="text-danger ms-2 mb-0 font-weight-medium">-</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-danger">
                                <a href="<?= ROOT; ?>/admin/levels/delete" class="text-danger" style="text-decoration: none;">
                                    <span class="mdi mdi-delete-forever icon-item"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="<?= ROOT; ?>/admin/levels/delete" style="text-decoration: none;">
                        <h6 class="text-muted font-weight-normal">Remove level</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        <?= $action; ?>
                        <a href="#">
                            <button type="button" class="btn btn-info float-end"><i class="mdi mdi-account-search "></i> Find</button>
                        </a>
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover text-white">
                            <thead>
                                <tr>
                                    <th class="text-white"> Level Name </th>
                                    <th class="text-white"> Abbreviation </th>
                                    <th class="text-white"> More </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data['rows'])) : ?>
                                    <?php foreach ($data['rows'] as $row) : ?>
                                        <tr>
                                            <td> <?= esc($row->level_name); ?> </td>
                                            <td> <?= esc($row->level_abbreviation); ?> </td>
                                            <td>
                                                <a href="<?= ROOT; ?>/admin/level/<?= $row->level_id; ?>" style="text-decoration: none;">
                                                    <div class="badge badge-outline-info"><i class="mdi mdi-view-list"></i> Details</div>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div><?php $pager->display(); ?></div>
                </div>
            </div>
        </div>
    </div>

<?php endif;  ?>

<?php $this->view("admin/admin.footer"); ?>