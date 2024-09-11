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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Role</label>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <label for="role-student" class="form-check-label">
                                                <input type="radio" class="form-check-input" name="role" id="role-student" value="student" <?= old_checked('role', 'student', $data['row']->role ?? ''); ?> checked> Student
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <label for="role-teacher" class="form-check-label">
                                                <input type="radio" class="form-check-input" name="role" id="role-teacher" value="teacher"> <?= old_checked('role', 'teacher', $data['row']->role ?? ''); ?> Teacher
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <label for="role-admin" class="form-check-label">
                                                <input type="radio" class="form-check-input" name="role" id="role-admin" value="admin" <?= old_checked('role', 'admin', $data['row']->role ?? ''); ?>> Admin
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
                                        <input type="text" class="form-control text-white" name="school_name" id="school-name" value="<?= old_value('school_name', $data['row']->school_name ?? ''); ?>" placeholder="St. Martin's School" />
                                        <?= !empty($user->getError('school_name')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('school_name')) . '</span>' : ""; ?>
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

                        <p class="card-description"> Contact </p>
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

                        <p class="card-description"> Password </p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="verify_password" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control text-light" id="verify_password" name="verify_password" value="<?= old_value('verify_password', $data['row']->verify_password ?? ''); ?>" placeholder="Enter your old password" autofocus />
                                        <?= !empty($user->getError('verify_password')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('verify_password')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="new_password" class="col-sm-4 col-form-label">New password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control text-light" id="new_password" name="new_password" value="<?= old_value('new_password', $data['row']->new_password ?? ''); ?>" placeholder="Enter your new password" />
                                        <?= !empty($user->getError('new_password')) ? '<span class="text-danger text-left">' . formatFieldName($user->getError('new_password')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="confirm_password" class="col-sm-4 col-form-label">Confirm password</label>
                                    <div class="col-sm-8">
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
                                <p class="lead"><i class="mdi mdi-phone-outline"></i> <a href="tel:<?= esc($data['row']->contact); ?>" class="lead" style="text-decoration: none; color:#ffffff"><?= esc($data['row']->contact); ?></a></p>
                            </div>
                            <div class="col-md-6">
                                <p class="lead"><i class="mdi mdi-school"></i> <?= esc($data['row']->school_name); ?></p>
                                <p class="lead"><i class="mdi mdi-account-key"></i> <?= esc(ucfirst($data['row']->role)); ?></p>
                                <p class="le
                                ad"><?= esc($data['row']->level_id); ?></p>
                            </div>
                            <div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="updateUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="updateProductModalLabel">Update product details</h3>
                                        </div>
                                        <div class="modal-body">
                                            <form id="update-user-form" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="text" id="update-user-id" name="user_id" value="<?= $data['row']->user_id; ?>">
                                                        <div class="form-group">
                                                            <label for="update-product-name">Product Name</label>
                                                            <input type="text" class="form-control" id="update-product-name" name="name" value="<?= $name; ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="update-product-price">Price</label>
                                                            <input type="number" class="form-control" id="update-product-price" name="price" value="<?= $price; ?>" required>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="update-product-quantity">Quantity</label>
                                                            <input type="number" id="update-product-quantity" class="form-control" name="quantity" value="<?= $quaunity; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="update-product-description">Description</label>
                                                            <textarea class="form-control" id="update-product-description" name="description"><?= $description; ?></textarea>

                                                        </div>
                                                        <div class="row">
                                                            <label for="image-upload">Select Image:</label>
                                                            <input type="file" class="form-control mb-2" id="image-upload" name="image" accept="image/*">
                                                            <div id="image-preview-container">
                                                                <img id="image-preview" src="../uploads/<?= $image; ?>" alt="current product image" width="100%" height="360px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <button id="save-product-update-btn" class="btn btn-block btn-outline-primary" name="save-product-update-btn">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?= ROOT; ?>/admin/profile/edit">
                                    <button type="button" class="btn btn-light float-end">Edit details</button>
                                </a>
                                <a href="<?= ROOT; ?>/admin/profile/change-password">
                                    <button type="button" class="btn btn-dark float-start">Change password</button>
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