<?php

/**
 * Admin dashboard: users page
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
                        <p class="card-description"> Personal info </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="first_name" value="<?= old_value('first_name'); ?>" placeholder="Ray" autocapitalize="on" autofocus />
                                        <?= !empty($user->getError('first_name')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('first_name')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="last_name" value="<?= old_value('last_name'); ?>" placeholder="Berth" autocapitalize="on" />
                                        <?= !empty($user->getError('last_name')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('last_name')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Role</label>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <label for="role-student" class="form-check-label">
                                                <input type="radio" class="form-check-input" name="role" id="role-student" value="student" <?= old_checked('role', 'student'); ?> checked> Student
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <label for="role-teacher" class="form-check-label">
                                                <input type="radio" class="form-check-input" name="role" id="role-teacher" value="teacher" <?= old_checked('role', 'teacher'); ?>> Teacher
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <label for="role-admin" class="form-check-label">
                                                <input type="radio" class="form-check-input" name="role" id="role-admin" value="admin" <?= old_checked('role', 'admin'); ?>> Admin
                                            </label>
                                        </div>
                                    </div>
                                    <?= !empty($user->getError('role')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('role')) . '</span>' : ""; ?>
                                </div>
                            </div>
                        </div>

                        <p class="card-description"> Contact info </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control text-white" id="email" name="email" value="<?= old_value('email'); ?>" placeholder="rayberth@user.com" autocomplete="on" />
                                        <?= !empty($user->getError('email')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('email')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="contact" class="col-sm-3 col-form-label">Contact</label>
                                    <div class="col-sm-9">
                                        <input type="tel" class="form-control text-white" id="contact" name="contact" value="<?= old_value('contact'); ?>" placeholder="0240001112" />
                                        <?= !empty($user->getError('contact')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('contact')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="card-description"> Academic info </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="level" class="col-sm-3 col-form-label">Level</label>
                                    <div class="col-sm-9">
                                        <select class="form-control text-white" id="level" name="level_id">
                                            <?php if (!empty($data['levels'])) : ?>
                                                <option value="">Select a level</option>
                                                <?php foreach ($data['levels'] as $level) : ?>
                                                    <option value="<?= $level->level_id; ?>" <?= old_select('level_id', $level->level_id ?? ''); ?>> <?= $level->level_name; ?> </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <?= !empty($user->getError('level_id')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('level_id')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="school-name" class="col-sm-3 col-form-label">School name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="school_name" id="school-name" value="<?= old_value('school_name'); ?>" placeholder="St. Martin's School" />
                                        <?= !empty($user->getError('school_name')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('school_name')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= ROOT; ?>/admin/users">
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
<?php elseif ($action === 'upload-file') : ?>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        <?= ucfirst($action); ?>
                    </h2>
                    <form class="form-sample" method="post" enctype="multipart/form-data">
                        <p class="card-description"> Accepted files .xls, .xlsx or .csv </p>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">File</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control text-white" name="import_excel" value="<?= old_value('import_excel'); ?>" placeholder="Select excel file" autofocus />
                                        <?= !empty($user->getError('import_excel')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('import_excel')) . '</span>' : ''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" hidden>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="hidden" class="form-control text-white" name="name" value="<?= old_value('name'); ?>" placeholder="" hidden />
                                        <?= !empty($user->getError('name')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('name')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= ROOT; ?>/admin/users">
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
                            <a href="<?= ROOT; ?>/admin/users/upload-file" style="text-decoration: none;">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0 text-white">Add Multiple</h3>
                                    <p class="text-success ms-2 mb-0 font-weight-medium">+</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-info">
                                <a href="<?= ROOT; ?>/admin/users/upload-file">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Excel file</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <a href="<?= ROOT; ?>/admin/users/add" style="text-decoration: none;">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0 text-white">Add</h3>
                                    <p class="text-success ms-2 mb-0 font-weight-medium">+</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <a href="<?= ROOT; ?>/admin/users/add" class="text-success" style="text-decoration: none;">
                                    <span class="mdi mdi-new-box icon-item"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="<?= ROOT; ?>/admin/users/add" style="text-decoration: none;">
                        <h6 class="text-muted font-weight-normal">New user</h6>
                    </a>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <a href="<?= ROOT; ?>/admin/users/edit" style="text-decoration: none;">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0 text-white">Update</h3>
                                    <p class="text-warning ms-2 mb-0 font-weight-medium">+/-</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-warning">
                                <a href="<?= ROOT; ?>/admin/users/edit" class="text-warning" style="text-decoration: none;">
                                    <span class="mdi mdi-contrast icon-item"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="<?= ROOT; ?>/admin/users/edit" style="text-decoration: none;">
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
                            <a href="<?= ROOT; ?>/admin/users/delete" style="text-decoration: none;">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0 text-white">Delete</h3>
                                    <p class="text-danger ms-2 mb-0 font-weight-medium">-</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-danger">
                                <a href="<?= ROOT; ?>/admin/users/delete" class="text-danger" style="text-decoration: none;">
                                    <span class="mdi mdi-delete-forever icon-item"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="<?= ROOT; ?>/admin/users/delete" style="text-decoration: none;">
                        <h6 class="text-muted font-weight-normal">Remove user</h6>
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
                                    <th class="text-white"> Full Name </th>
                                    <th class="text-white"> Contact </th>
                                    <th class="text-white"> Email </th>
                                    <th class="text-white"> Role </th>
                                    <th class="text-white"> School </th>
                                    <th class="text-white"> More </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data['rows'])) : ?>
                                    <?php foreach ($data['rows'] as $row) : ?>
                                        <tr>
                                            <td> <?= esc($row->first_name) . ' ' . esc($row->last_name); ?> </td>
                                            <td> <?= esc($row->contact); ?> </td>
                                            <td> <?= esc($row->email); ?> </td>
                                            <td> <?= esc(ucfirst($row->role)); ?> </td>
                                            <td> <?= esc(ucwords($row->school_name)); ?> </td>
                                            <td>
                                                <a href="<?= ROOT; ?>/admin/user/<?= $row->user_id; ?>" style="text-decoration: none;">
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