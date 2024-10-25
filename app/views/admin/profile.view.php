<?php

/**
 * Admin profile page
 */
?>
<?php $this->view("admin/admin.header"); ?>

<?php if ($action === 'edit'): ?>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        <?= ucfirst($action); ?>
                    </h2>
                    <form class="form-sample" method="post" enctype="multipart/form-data">
                        <p class="card-description"> Personal info </p>
                        <input type="hidden" name="user_id" id="" value="<?= old_value('user_id', $data['row']->user_id ?? ''); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="first_name" value="<?= old_value('first_name', $data['row']->first_name ?? ''); ?>" placeholder="Ray" autocapitalize="on" autofocus />
                                        <?= !empty($user->getError('first_name')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('first_name')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="last_name" value="<?= old_value('last_name', $data['row']->last_name ?? ''); ?>" placeholder="Berth" autocapitalize="on" />
                                        <?= !empty($user->getError('last_name')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('last_name')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <p class="card-description"> Contact </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control text-white" id="email" name="email" value="<?= old_value('email', $data['row']->email ?? ''); ?>" placeholder="rayberth@quiz.com" autocomplete="on" />
                                        <?= !empty($user->getError('email')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('email')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="contact" class="col-sm-3 col-form-label">Contact</label>
                                    <div class="col-sm-9">
                                        <input type="tel" class="form-control text-white" id="contact" name="contact" value="<?= old_value('contact', $data['row']->contact ?? ''); ?>" placeholder="0240001112" />
                                        <?= !empty($user->getError('contact')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('contact')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= ROOT; ?>/admin/profile">
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

<?php elseif ($action === 'change-password'): ?>

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
                                        <input type="text" class="form-control text-dark" name="first_name" value="<?= old_value('first_name', $data['row']->first_name ?? ''); ?>" placeholder="Ray" autocapitalize="on" disabled />
                                        <?= !empty($user->getError('first_name')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('first_name')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-dark" name="last_name" value="<?= old_value('last_name', $data['row']->last_name ?? ''); ?>" placeholder="Berth" autocapitalize="on" disabled />
                                        <?= !empty($user->getError('last_name')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('last_name')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="card-description"> Contacts </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control text-dark" id="email" name="email" value="<?= old_value('email', $data['row']->email ?? ''); ?>" placeholder="rayberth@quiz.com" autocomplete="on" disabled />
                                        <?= !empty($user->getError('email')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('email')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="contact" class="col-sm-3 col-form-label">Contact</label>
                                    <div class="col-sm-9">
                                        <input type="tel" class="form-control text-dark" id="contact" name="contact" value="<?= old_value('contact', $data['row']->contact ?? ''); ?>" placeholder="0240001112" disabled />
                                        <?= !empty($user->getError('contact')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('contact')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="card-description"> Authentication </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="verify_password" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control text-light" id="verify_password" name="verify_password" value="<?= old_value('verify_password', $data['row']->verify_password ?? ''); ?>" placeholder="Enter your old password" autofocus />
                                        <?= !empty($user->getError('verify_password')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('verify_password')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="new_password" class="col-sm-3 col-form-label">New password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control text-light" id="new_password" name="new_password" value="<?= old_value('new_password', $data['row']->new_password ?? ''); ?>" placeholder="Enter your new password" />
                                        <?= !empty($user->getError('new_password')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('new_password')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="confirm_password" class="col-sm-3 col-form-label">Confirm password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control text-light" id="confirm_password" name="confirm_password" value="<?= old_value('confirm_password', $data['row']->confirm_password ?? ''); ?>" placeholder="Re-enter your new password" />
                                        <?= !empty($user->getError('confirm_password')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('confirm_password')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= ROOT; ?>/admin/profile">
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

<?php else : ?>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <?php if (!empty($data['row'])) : ?>
                    <div class="card-body">
                        <div class="row mx-auto">
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                <h3 class="card-title">
                                    User Profile
                                </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="lead"><i class="mdi mdi-account-outline"></i> <?= esc($data['row']->first_name) . ' ' . esc($data['row']->last_name); ?></p>
                                <p class="lead"><i class="mdi mdi-email-outline"></i> <a href="mailto:<?= esc($data['row']->email); ?>" style="text-decoration: none; color:#ffffff"><?= esc($data['row']->email); ?></a></p>
                            </div>
                            <div class="col-md-6">
                                <p class="lead"><i class="mdi mdi-account-key"></i> <?= esc(ucfirst($data['row']->role)); ?></p>
                                <p class="lead"><i class="mdi mdi-phone-outline"></i> <a href="tel:<?= esc($data['row']->contact); ?>" class="lead" style="text-decoration: none; color:#ffffff"><?= esc($data['row']->contact); ?></a></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?= ROOT; ?>/admin/profile/edit">
                                    <button type="button" class="btn btn-outline-warning float-end">Edit details</button>
                                </a>
                                <a href="<?= ROOT; ?>/admin/profile/change-password">
                                    <button type="button" class="btn btn-outline-warning float-start">Change password</button>
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