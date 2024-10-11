<?php

/**
 * Admin dashboard: quizzes page
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
                        <p class="card-description"> Quiz info </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control text-white" id="category" name="category_id">
                                            <?php if (!empty($data['categories'])) : ?>
                                                <option value="">Select a category</option>
                                                <?php foreach ($data['categories'] as $category) : ?>
                                                    <option value="<?= $category->category_id; ?>" <?= old_select('category_id', $category->category_id ?? ''); ?>> <?= $category->category_name; ?> </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <?= !empty($quiz->getError('category_id')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('category_id')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Level</label>
                                    <div class="col-sm-9">
                                        <select class="form-control text-white" id="level" name="level_id">
                                            <?php if (!empty($data['levels'])) : ?>
                                                <option value="">Select a level</option>
                                                <?php foreach ($data['levels'] as $level) : ?>
                                                    <option value="<?= $level->level_id; ?>" <?= old_select('level_id', $level->level_id ?? ''); ?>> <?= $level->level_name; ?> </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <?= !empty($quiz->getError('level_id')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('level_id')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Subject</label>
                                    <div class="col-sm-9">
                                        <select class="form-control text-white" id="subject" name="subject_id" value="<?= old_select('subject_id', 'subject_name'); ?>">
                                            <?php if (!empty($data['subjects'])) : ?>
                                                <option value="">Select a subject</option>
                                                <?php foreach ($data['subjects'] as $subject) : ?>
                                                    <option value="<?= $subject->subject_id; ?>" <?= old_select('subject_id', $subject->subject_id ?? ''); ?>> <?= $subject->subject_title; ?> </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <?= !empty($quiz->getError('subject_id')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('subject_id')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="year_or_form" class="col-sm-3 col-form-label">Year or Form</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" id="year_or_form" name="year_or_form" value="<?= old_value('year_or_form'); ?>" min="4" max="6" placeholder="<?= date('Y'); ?> or Form 2" />
                                        <?= !empty($quiz->getError('year_or_form')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('year_or_form')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= ROOT; ?>/admin/quizzes">
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
                            <a href="<?= ROOT; ?>/admin/quizzes/upload-questions" style="text-decoration: none;">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0 text-white">Add Multiple</h3>
                                    <p class="text-success ms-2 mb-0 font-weight-medium">+</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-info">
                                <a href="<?= ROOT; ?>/admin/quizzes/upload-questions">
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
                            <a href="<?= ROOT; ?>/admin/quizzes/add" style="text-decoration: none;">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0 text-white">Add</h3>
                                    <p class="text-success ms-2 mb-0 font-weight-medium">+</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <a href="<?= ROOT; ?>/admin/quizzes/add" class="text-success" style="text-decoration: none;">
                                    <span class="mdi mdi-new-box icon-item"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="<?= ROOT; ?>/admin/quizzes/add" style="text-decoration: none;">
                        <h6 class="text-muted font-weight-normal">New quiz</h6>
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
                            <a href="<?= ROOT; ?>/admin/quizzes/edit" style="text-decoration: none;">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0 text-white">Update</h3>
                                    <p class="text-warning ms-2 mb-0 font-weight-medium">+/-</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-warning">
                                <a href="<?= ROOT; ?>/admin/quizzes/edit" class="text-warning" style="text-decoration: none;">
                                    <span class="mdi mdi-contrast icon-item"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="<?= ROOT; ?>/admin/quizzes/edit" style="text-decoration: none;">
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
                            <a href="<?= ROOT; ?>/admin/quizzes/delete" style="text-decoration: none;">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0 text-white">Delete</h3>
                                    <p class="text-danger ms-2 mb-0 font-weight-medium">-</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-danger">
                                <a href="<?= ROOT; ?>/admin/quizzes/delete" class="text-danger" style="text-decoration: none;">
                                    <span class="mdi mdi-delete-forever icon-item"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="<?= ROOT; ?>/admin/quizzes/delete" style="text-decoration: none;">
                        <h6 class="text-muted font-weight-normal">Remove quiz</h6>
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
                                    <th class="text-white"> Categories </th>
                                    <th class="text-white"> Levels </th>
                                    <th class="text-white"> Subjects </th>
                                    <th class="text-white"> Year or Form </th>
                                    <th class="text-white"> More </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data['rows'])) : ?>
                                    <?php foreach ($data['rows'] as $row) : ?>
                                        <tr>
                                            <td> <?= esc($row->category_name); ?> </td>
                                            <td> <?= esc($row->level_name); ?> </td>
                                            <td> <?= esc($row->subject_title); ?> </td>
                                            <td> <?= esc(ucfirst($row->year_or_form)); ?> </td>
                                            <td>
                                                <a href="<?= ROOT; ?>/admin/quiz/<?= $row->quiz_id; ?>" style="text-decoration: none;">
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