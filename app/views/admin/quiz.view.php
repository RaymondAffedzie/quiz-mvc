<?php

/**
 * Admin dashboard: quiz page
 */
?>
<?php $this->view("admin/admin.header"); ?>

<?php if ($action === 'add-questions') : ?>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        <?= ucfirst($action); ?>
                    </h2>
                    <form class="form-sample" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="quiz_id" id="" value="<?= old_value('quiz_id', $row->quiz_id ?? ''); ?>">
                        <p class="card-description"> Questions info </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Quetion</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control text-white" id="question" name="question" value="<?= old_value('question'); ?>"></textarea>
                                        <?= !empty($quiz->getError('category_id')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('category_id')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Correct Answer</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control text-white" id="correct_answer" name="correct_answer" value="<?= old_value('correct_answer'); ?>"></textarea>
                                        <?= !empty($quiz->getError('subject_id')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('subject_id')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="card-description"> Options info </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">First Option</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control text-white" id="option" name="option" value="<?= old_value('option'); ?>"></textarea>
                                        <?= !empty($quiz->getError('level_id')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('level_id')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Second Option</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control text-white" id="option" name="option" value="<?= old_value('option'); ?>"></textarea>
                                        <?= !empty($quiz->getError('level_id')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('level_id')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Third Option</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control text-white" id="option" name="option" value="<?= old_value('option'); ?>"></textarea>
                                        <?= !empty($quiz->getError('level_id')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('level_id')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Forth Option</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control text-white" id="option" name="option" value="<?= old_value('option'); ?>"></textarea>
                                        <?= !empty($quiz->getError('level_id')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('level_id')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">    
                                        <input type="file" class="form-control text-white" name="image" accept="image/*" placeholder="Upload Image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Comment</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control text-white" id="comment" name="comment" value="<?= old_value('comment'); ?>" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= ROOT; ?>/admin/quiz/<?= URL(3); ?>">
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

<?php elseif ($action === 'edit') : ?>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        <?= ucfirst($action); ?>
                    </h2>
                    <form class="form-sample" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="quiz_id" id="" value="<?= old_value('quiz_id', $row->quiz_id ?? ''); ?>">
                        <p class="card-description"> Quiz info </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control text-white" id="category_id" name="category_id">
                                            <option value="<?= $categories[0]->category_id; ?>"><?= $categories[0]->category_name; ?></option>
                                            <?php if (!empty($categories)) : ?>
                                                <?php foreach ($categories as $category) : ?>
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
                                    <label class="col-sm-3 col-form-label">Subject</label>
                                    <div class="col-sm-9">
                                        <select class="form-control text-white" id="subject" name="subject_id">
                                            <option value="<?= $subjects[0]->subject_id; ?>"><?= $subjects[0]->subject_title; ?></option>
                                            <?php if (!empty($subjects)) : ?>
                                                <?php foreach ($subjects as $subject) : ?>
                                                    <option value="<?= $subject->subject_id; ?>" <?= old_select('subject_id', $subject->subject_id ?? ''); ?>> <?= $subject->subject_title; ?> </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <?= !empty($quiz->getError('subject_id')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('subject_id')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Level</label>
                                    <div class="col-sm-9">
                                        <select class="form-control text-white" id="level" name="level_id">
                                            <option value="<?= $levels[0]->level_id; ?>"><?= $levels[0]->level_name; ?></option>
                                            <?php if (!empty($levels)) : ?>
                                                <?php foreach ($levels as $level) : ?>
                                                    <option value="<?= $level->level_id; ?>" <?= old_select('level_id', $level->level_id ?? ''); ?>> <?= $level->level_name; ?> </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <?= !empty($quiz->getError('level_id')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('level_id')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Year or Form</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="year_or_form" value="<?= old_value('year_or_form', $row->year_or_form ?? ''); ?>" min="4" max="6" placeholder="Year or Form" />
                                        <?= !empty($quiz->getError('year_or_form')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('year_or_form')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= ROOT; ?>/admin/quiz/<?= URL(3); ?>">
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
                        <input type="hidden" name="quiz_id" id="" value="<?= old_value('quiz_id', $row->quiz_id ?? ''); ?>">
                        <p class="card-description"> Quiz info </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control text-white" id="category_id" name="category_id">
                                            <option value="<?= $categories[0]->category_id; ?>"><?= $categories[0]->category_name; ?></option>
                                            <?php if (!empty($categories)) : ?>
                                                <?php foreach ($categories as $category) : ?>
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
                                    <label class="col-sm-3 col-form-label">Subject</label>
                                    <div class="col-sm-9">
                                        <select class="form-control text-white" id="subject" name="subject_id">
                                            <option value="<?= $subjects[0]->subject_id; ?>"><?= $subjects[0]->subject_title; ?></option>
                                            <?php if (!empty($subjects)) : ?>
                                                <?php foreach ($subjects as $subject) : ?>
                                                    <option value="<?= $subject->subject_id; ?>" <?= old_select('subject_id', $subject->subject_id ?? ''); ?>> <?= $subject->subject_title; ?> </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <?= !empty($quiz->getError('subject_id')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('subject_id')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Level</label>
                                    <div class="col-sm-9">
                                        <select class="form-control text-white" id="level" name="level_id">
                                            <option value="<?= $levels[0]->level_id; ?>"><?= $levels[0]->level_name; ?></option>
                                            <?php if (!empty($levels)) : ?>
                                                <?php foreach ($levels as $level) : ?>
                                                    <option value="<?= $level->level_id; ?>" <?= old_select('level_id', $level->level_id ?? ''); ?>> <?= $level->level_name; ?> </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <?= !empty($quiz->getError('level_id')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('level_id')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Year or Form</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control text-white" name="year_or_form" value="<?= old_value('year_or_form', $row->year_or_form ?? ''); ?>" min="4" max="6" placeholder="Year or Form" />
                                        <?= !empty($quiz->getError('year_or_form')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('year_or_form')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= ROOT; ?>/admin/quiz/<?= URL(3); ?>">
                                    <button type="button" class="btn btn-danger float-start">Cancel</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-outline-danger float-lg-end me-2">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php else : ?>

    <div class="row">
        <div class="col-12 col-md-10 col-lg-9 col-xl-8 mx-auto grid-margin">
            <div class="card">
                <?php if (!empty($data['row'])) : ?>
                    <div class="card-body">
                        <div class="row mx-auto">
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                <h3 class="card-title">
                                    Quiz Details
                                </h3>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-8 col-xl-8">
                                <a href="<?= ROOT; ?>/admin/quiz/delete/<?= $data['row'][0]->quiz_id ?>" style="text-decoration: none;">
                                    <button type="button" class=" mx-1 btn btn-danger float-end"><i class="mdi mdi-delete-forever"></i> Delete</button>
                                </a>
                                <a href="<?= ROOT; ?>/admin/quiz/edit/<?= $data['row'][0]->quiz_id ?>" style="text-decoration: none;">
                                    <button type="button" class="mx-1 btn btn-warning float-end"><i class="mdi mdi-contrast"></i> Update</button>
                                </a>
                            </div>
                        </div>
                        <div class="row mx-auto">
                            <div class="col-md-6 mx-auto">
                                <p class="lead"><i class="mdi mdi-table-large"></i> <?= esc($data['row'][0]->category_name); ?></p>
                                <p class="lead"><i class="mdi mdi-chart-bar"></i> <?= esc($data['row'][0]->level_name); ?></p>
                            </div>
                            <div class="col-md-6 mx-auto">
                                <p class="lead"><i class="mdi mdi-book-open-page-variant"></i> <?= esc($data['row'][0]->subject_title); ?></p>
                                <p class="lead"><i class="mdi mdi-calendar"></i> <?= esc($data['row'][0]->year_or_form); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?= ROOT; ?>/admin/quizzes" style="text-decoration: none;">
                                    <button type="button" class="btn btn-danger float-end">Cancel</button>
                                </a>
                                <button type="button" class="btn btn-primary mx-2 float-end">Update Questions</button>
                                <button type="button" class="btn btn-info float-end">View Questions</button>
                                <a href="<?= ROOT; ?>/admin/quiz/add-questions/<?= $data['row'][0]->quiz_id ?>" style="text-decoration: none;">
                                    <button type="button" class="btn btn-success mx-2 float-end">Add Questions</button>
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