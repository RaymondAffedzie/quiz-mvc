<?php

/**
 * Admin dashboard: level page
 */
?>
<?php $this->view("admin/admin.header"); ?>

<?php if ($action === 'edit') : ?>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        <?= ucfirst($action); ?>
                    </h2>
                    <form class="form-sample" method="post" enctype="multipart/form-data">
                        <p class="card-description"> Level info </p>
                        <input type="hidden" name="level_id" id="" value="<?= old_value('level_id', $data['row']->level_id ?? ''); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Level Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="level_name" value="<?= old_value('level_name', $data['row']->level_name ?? ''); ?>" placeholder="Junior High School" autocapitalize="on" autofocus />
                                        <?= !empty($level->getError('level_name')) ? '<span class="text-danger text-left">' . formatFieldName($level->getError('level_name')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Level Abbreviation</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="level_abbreviation" value="<?= old_value('level_abbreviation', $data['row']->level_abbreviation ?? ''); ?>" placeholder="JHS" autocapitalize="on" />
                                        <?= !empty($level->getError('level_abbreviation')) ? '<span class="text-danger text-left">' . formatFieldName($level->getError('level_abbreviation')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                                              
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= ROOT; ?>/admin/level/<?= URL(3); ?>">
                                    <button type="button" class="btn btn-danger float-start">Cancel</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary float-lg-end me-2">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php elseif ($action === 'delete') : ?>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        <?= ucfirst($action); ?>
                    </h2>
                    <div class="alert alert-danger">
                        <h3 class="text-center text-danger">Do you want to delete this <?= URL(1) ?>?</h3>
                    </div>
                    <form class="form-sample" method="post" enctype="multipart/form-data">
                        <p class="card-description"> Level info </p>
                        <input type="hidden" name="level_id" id="" value="<?= old_value('level_id', $data['row']->level_id ?? ''); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Level Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="level_name" value="<?= old_value('level_name', $data['row']->level_name ?? ''); ?>" placeholder="Ray" autocapitalize="on" autofocus />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Abbreviation</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="level_abbreviation" value="<?= old_value('level_abbreviation', $data['row']->level_abbreviation ?? ''); ?>" placeholder="Berth" autocapitalize="on" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= ROOT; ?>/admin/level/<?= URL(3); ?>">
                                    <button type="button" class="btn btn-danger float-start">Cancel</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary float-lg-end me-2">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php else : ?>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <?php if (!empty($data['row'])) : ?>
                    <div class="card-body">
                        <div class="row mx-auto">
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                <h3 class="card-title">
                                    Level Details
                                </h3>
                            </div>
                            <div class="col-md-6 col-lg-8 col-xl-6">
                                <a href="<?= ROOT; ?>/admin/level/delete/<?= $data['row']->level_id ?>" style="text-decoration: none;">
                                    <button type="button" class=" mx-1 btn btn-danger float-end"><i class="mdi mdi-delete-forever"></i> Delete</button>
                                </a>
                                <a href="<?= ROOT; ?>/admin/level/edit/<?= $data['row']->level_id ?>" style="text-decoration: none;">
                                    <button type="button" class="mx-1 btn btn-warning float-end"><i class="mdi mdi-contrast"></i> Update</button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="lead"><i class="mdi mdi-menu"></i> <?= esc($data['row']->level_name); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="lead"><i class="mdi mdi-dots-horizontal"></i> <?= esc($data['row']->level_abbreviation); ?></p>                               
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?= ROOT; ?>/admin/levels">
                                    <button type="button" class="btn btn-primary float-end">View levels</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php $this->view("admin/admin.footer"); ?>