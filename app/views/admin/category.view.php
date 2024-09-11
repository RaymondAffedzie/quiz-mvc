<?php

/**
 * Admin dashboard: category page
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
                        <p class="card-description"> Category info </p>
                        <input type="hidden" name="category_id" id="" value="<?= old_value('category_id', $data['row']->category_id ?? ''); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">category Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="category_name" value="<?= old_value('category_name', $data['row']->category_name ?? ''); ?>" placeholder="Past questions" autocapitalize="on" autofocus />
                                        <?= !empty($category->getError('category_name')) ? '<span class="text-danger text-left">' . formatFieldName($category->getError('category_name')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                                              
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= ROOT; ?>/admin/category/<?= URL(3); ?>">
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
                        <p class="card-description"> category info </p>
                        <input type="hidden" name="category_id" id="" value="<?= old_value('category_id', $data['row']->category_id ?? ''); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">category Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="category_name" value="<?= old_value('category_name', $data['row']->category_name ?? ''); ?>" placeholder="Ray" autocapitalize="on" autofocus />
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= ROOT; ?>/admin/category/<?= URL(3); ?>">
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
                                    Details
                                </h3>
                            </div>
                            <div class="col-md-6 col-lg-8 col-xl-6">
                                <a href="<?= ROOT; ?>/admin/category/delete/<?= $data['row']->category_id ?>" style="text-decoration: none;">
                                    <button type="button" class=" mx-1 btn btn-danger float-end"><i class="mdi mdi-delete-forever"></i> Delete</button>
                                </a>
                                <a href="<?= ROOT; ?>/admin/category/edit/<?= $data['row']->category_id ?>" style="text-decoration: none;">
                                    <button type="button" class="mx-1 btn btn-warning float-end"><i class="mdi mdi-contrast"></i> Update</button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="lead"><i class="mdi mdi-menu"></i> <?= esc($data['row']->category_name); ?></p>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?= ROOT; ?>/admin/categories">
                                    <button type="button" class="btn btn-primary float-end">View categories</button>
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