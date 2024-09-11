<?php

/**
 * Admin dashboard: user page
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
                        <p class="card-description"> Personal info </p>
                        <input type="hidden" name="user_id" id="" value="<?= old_value('user_id', $row[0]->user_id ?? ''); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="first_name" value="<?= old_value('first_name', $row[0]->first_name ?? ''); ?>" placeholder="Ray" autocapitalize="on" autofocus />
                                        <?= !empty($user->getError('first_name')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('first_name')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="last_name" value="<?= old_value('last_name', $row[0]->last_name ?? ''); ?>" placeholder="Berth" autocapitalize="on" />
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
                                                <input type="radio" class="form-check-input" name="role" id="role-student" value="student" <?= old_checked('role', 'student', $row[0]->role ?? ''); ?> checked> Student
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <label for="role-teacher" class="form-check-label">
                                                <input type="radio" class="form-check-input" name="role" id="role-teacher" value="teacher"> <?= old_checked('role', 'teacher', $row[0]->role ?? ''); ?> Teacher
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <label for="role-admin" class="form-check-label">
                                                <input type="radio" class="form-check-input" name="role" id="role-admin" value="admin" <?= old_checked('role', 'admin', $row[0]->role ?? ''); ?>> Admin
                                            </label>
                                        </div>
                                    </div>
                                    <?= !empty($user->getError('role')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('role')) . '</span>' : ""; ?>
                                </div>
                            </div>
                        </div>

                        <p class="card-description"> Contact </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control text-white" id="email" name="email" value="<?= old_value('email', $row[0]->email ?? ''); ?>" placeholder="rayberth@quiz.com" autocomplete="on" />
                                        <?= !empty($user->getError('email')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('email')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="contact" class="col-sm-3 col-form-label">Contact</label>
                                    <div class="col-sm-9">
                                        <input type="tel" class="form-control text-white" id="contact" name="contact" value="<?= old_value('contact', $row[0]->contact ?? ''); ?>" placeholder="0240001112" />
                                        <?= !empty($user->getError('contact')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('contact')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="level" class="col-sm-3 col-form-label">Level</label>
                                    <div class="col-sm-9">
                                        <select class="form-control text-white" id="level" name="level_id">
                                            <option value="<?= $row[0]->level_id; ?>"><?= $row[0]->level_name; ?></option>
                                            <?php if (!empty($levels)) : ?>
                                                <?php foreach ($levels as $level) : ?>
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
                                        <input type="text" class="form-control text-white" name="school_name" id="school-name" value="<?= old_value('school_name', $row[0]->school_name ?? ''); ?>" placeholder="St. Martin's School" />
                                        <?= !empty($user->getError('school_name')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('school_name')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= ROOT; ?>/admin/user/<?= URL(3); ?>">
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
                        <p class="card-description"> Personal info </p>
                        <input type="hidden" name="user_id" id="" value="<?= old_value('user_id', $row[0]->user_id ?? ''); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="first_name" value="<?= old_value('first_name', $row[0]->first_name ?? ''); ?>" placeholder="Ray" autocapitalize="on" autofocus />
                                        <?= !empty($user->getError('first_name')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('first_name')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="last_name" value="<?= old_value('last_name', $row[0]->last_name ?? ''); ?>" placeholder="Berth" autocapitalize="on" />
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
                                                <input type="radio" class="form-check-input" name="role" id="role-student" value="student" <?= old_checked('role', 'student', $row[0]->role ?? ''); ?> checked> Student
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <label for="role-teacher" class="form-check-label">
                                                <input type="radio" class="form-check-input" name="role" id="role-teacher" value="teacher"> <?= old_checked('role', 'teacher', $row[0]->role ?? ''); ?> Teacher
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <label for="role-admin" class="form-check-label">
                                                <input type="radio" class="form-check-input" name="role" id="role-admin" value="admin" <?= old_checked('role', 'admin', $row[0]->role ?? ''); ?>> Admin
                                            </label>
                                        </div>
                                    </div>
                                    <?= !empty($user->getError('role')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('role')) . '</span>' : ""; ?>
                                </div>
                            </div>
                        </div>

                        <p class="card-description"> Contact </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control text-white" id="email" name="email" value="<?= old_value('email', $row[0]->email ?? ''); ?>" placeholder="rayberth@quiz.com" autocomplete="on" />
                                        <?= !empty($user->getError('email')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('email')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="contact" class="col-sm-3 col-form-label">Contact</label>
                                    <div class="col-sm-9">
                                        <input type="tel" class="form-control text-white" id="contact" name="contact" value="<?= old_value('contact', $row[0]->contact ?? ''); ?>" placeholder="0240001112" />
                                        <?= !empty($user->getError('contact')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('contact')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="level" class="col-sm-3 col-form-label">Level</label>
                                    <div class="col-sm-9">
                                        <select class="form-control text-white" id="level" name="level_id" value="<?= old_select('level_id', 'level_name', $row[0]->level_name ?? ''); ?>">
                                            <option></option>
                                        </select>
                                        <?= !empty($user->getError('level_id')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('level_id')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="school-name" class="col-sm-3 col-form-label">School name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="school_name" id="school-name" value="<?= old_value('school_name', $row[0]->school_name ?? ''); ?>" placeholder="St. Martin's School" />
                                        <?= !empty($user->getError('school_name')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('school_name')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= ROOT; ?>/admin/user/<?= URL(3); ?>">
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
                                    User Details
                                </h3>
                            </div>
                            <div class="col-md-6 col-lg-8 col-xl-6">
                                <a href="<?= ROOT; ?>/admin/user/delete/<?= $data['row'][0]->user_id ?>" style="text-decoration: none;">
                                    <button type="button" class=" mx-1 btn btn-danger float-end"><i class="mdi mdi-delete-forever"></i> Delete</button>
                                </a>
                                <a href="<?= ROOT; ?>/admin/user/edit/<?= $data['row'][0]->user_id ?>" style="text-decoration: none;">
                                    <button type="button" class="mx-1 btn btn-warning float-end"><i class="mdi mdi-contrast"></i> Update</button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="lead"><i class="mdi mdi-account-outline"></i> <?= esc($data['row'][0]->first_name) . ' ' . esc($data['row'][0]->last_name); ?></p>
                                <p class="lead"><i class="mdi mdi-email-outline"></i> <a href="mailto:<?= esc($data['row'][0]->email); ?>" style="text-decoration: none; color:#ffffff"><?= esc($data['row'][0]->email); ?></a></p>
                                <p class="lead"><i class="mdi mdi-phone-outline"></i> <a href="tel:<?= esc($data['row'][0]->contact); ?>" class="lead" style="text-decoration: none; color:#ffffff"><?= esc($data['row'][0]->contact); ?></a></p>
                            </div>
                            <div class="col-md-6">
                                <p class="lead"><i class="mdi mdi-school"></i> <?= esc($data['row'][0]->school_name); ?></p>
                                <p class="lead"><i class="mdi mdi-account-key"></i> <?= esc(ucfirst($data['row'][0]->role)); ?></p>
                                <p class="lead"><i class="mdi mdi-chart-bar"></i> <?= esc($data['row'][0]->level_name); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?= ROOT; ?>/admin/users">
                                    <button type="button" class="btn btn-primary float-end">View users</button>
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