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

                        <p class="card-description"> Only .csv file is accepted </p>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">File</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control text-white" name="import_excel" value="<?= old_value('import_excel'); ?>" placeholder="Select excel (.csv) file" autofocus />
                                        <?= !empty($question->getError('import_excel')) ? '<span class="text-danger text-left">' . formatFieldName($question->getError('import_excel')) . '</span>' : ''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" hidden>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"> Quiz Id</label>
                                    <div class="col-sm-12">
                                        <input type="hidden" class="form-control text-white" name="quiz_id" id="" value="<?= old_value('quiz_id', $row->quiz_id ?? ''); ?>">
                                        <?= !empty($quiz->getError('quiz_id')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('quiz_id')) . '</span>' : ""; ?>
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

    <!-- All questions in a quiz -->
<?php elseif ($action === 'questions') : ?>

    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        <?= $action; ?>
                        <a href="#">
                            <button type="button" class="btn btn-info float-end mx-1"><i class="mdi mdi-account-search"></i> Find</button>
                        </a>
                        <a href="<?= ROOT; ?>/admin/quiz/<?= URL(3); ?>">
                            <button type="button" class="btn btn-danger float-end"><i class="mdi mdi-arrow-left"></i> Back</button>
                        </a>
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover text-white">
                            <thead>
                                <tr>
                                    <th class="text-white"> Questions </th>
                                    <th class="text-white"> Correct Answer </th>
                                    <th class="text-white"> More </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data['rows'])) : ?>
                                    <?php foreach ($data['rows'] as $row) : ?>
                                        <tr>
                                            <td> <?= esc($row->question); ?> </td>
                                            <td> <?= esc($row->correct_answer); ?> </td>
                                            <td>
                                                <a href="<?= ROOT; ?>/admin/quiz/question-details/<?= $row->question_id; ?>" style="text-decoration: none;">
                                                    <div class="badge badge-outline-info"><i class="mdi mdi-view-list"></i> Question details </div>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <?php $pager->display(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Single question details in a quiz -->
<?php elseif ($action === 'question-details') : ?>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        <?= ucfirst($action); ?>
                    </h2>
                    <form class="form-sample" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="quiz_id" id="" value="<?= old_value('quiz_id', $row_question[0]->quiz_id ?? ''); ?>">
                        <p class="card-description"> Question info </p>

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Question</label>
                                            <div class="col-lg-9">
                                                <textarea class="form-control text-white" name="question" placeholder="Question"><?= esc($row_question[0]->question); ?></textarea>
                                                <?= !empty($question->getError('question')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('question')) . '</span>' : ""; ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <?php if (!empty($row_options)) : ?>
                                        <?php foreach ($row_options as $row) : ?>
                                            <div class="col-xxl-3">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Option</label>
                                                    <div class="col-lg-9">
                                                        <input type="hidden" class="form-control text-white" name="option_id[]" placeholder="Option" value="<?= esc($row->option_id); ?>">
                                                        <textarea class="form-control text-white" name="option[]" placeholder="Option" value="<?= esc($row->question_option); ?>"><?= esc($row->question_option); ?></textarea>
                                                        <?= !empty($question->getError('option')) ? '<span class="text-danger text-left">' . formatFieldName($question->getError('option')) . '</span>' : ""; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label class="d-block">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="question-image">Select Image</label>
                                        <div class="col-lg-9">
                                            <input type="file" class="form-control text-white" name="file" id="question-image" accept="image/*" onchange="display_image(this.files[0])">
                                        </div>
                                        <?= !empty($question->getError('file')) ? '<span class="text-danger text-left">' . formatFieldName($question->getError('file')) . '</span>' : ""; ?>
                                        <div>
                                            <?php if ($row_question[0]->image == null) : ?>

                                                <img src="<?= get_image(); ?>" alt="" class="js-image-preview img-thumbnail mx-auto d-block" style="cursor: pointer;">

                                            <?php else : ?>

                                                <img src="<?= get_image($image->getThumbnail($row_question[0]->image, 720, 480)); ?>" alt="" class="js-image-preview img-thumbnail mx-auto d-block" style="cursor: pointer;">

                                            <?php endif; ?>
                                        </div>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <a href="<?= ROOT; ?>/admin/quiz/<?= esc($row_question[0]->quiz_id); ?>">
                                    <button type="button" class="btn btn-warning float-lg-end">Cancel</button>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="<?= ROOT; ?>/admin/quiz/delete-question/<?= URL(3); ?>">
                                    <button type="button" class="btn btn-danger float-lg-end">Delete</button>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary float-lg-end me-2">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php elseif ($action === 'delete-question') : ?>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        <?= ucfirst($action); ?>
                    </h2>
                    <div class="alert alert-danger">
                        <h3 class="text-center text-danger">Do you want to delete this question?</h3>
                    </div>
                    <form class="form-sample" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="quiz_id" id="" value="<?= old_value('quiz_id', $row_question[0]->quiz_id ?? ''); ?>">
                        <p class="card-description"> Question info </p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Question</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control text-white" name="question" placeholder="Question"><?= esc($row_question[0]->question); ?></textarea>
                                        <?= !empty($question->getError('question')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('question')) . '</span>' : ""; ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <?php if (!empty($row_options)) : ?>
                                <?php foreach ($row_options as $row) : ?>
                                    <div class="col-xl-3">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Option</label>
                                            <div class="col-md-9">
                                                <input type="hidden" class="form-control text-white" name="option_id[]" placeholder="Option" value="<?= esc($row->option_id); ?>">
                                                <textarea class="form-control text-white" name="option[]" placeholder="Option" value="<?= esc($row->question_option); ?>"><?= esc($row->question_option); ?></textarea>
                                                <?= !empty($quiz->getError('option')) ? '<span class="text-danger text-left">' . formatFieldName($quiz->getError('option')) . '</span>' : ""; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= ROOT; ?>/admin/quiz/<?= esc($row_question[0]->quiz_id); ?>">
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
        <div class="col-12 grid-margin">
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
                                <a href="<?= ROOT; ?>/admin/quizzes">
                                    <button type="button" class="btn btn-danger float-end">Cancel</button>
                                </a>
                                <a href="<?= ROOT; ?>/admin/quiz/questions/<?= $data['row'][0]->quiz_id ?>">
                                    <button type="button" class="btn btn-info mx-2 float-end">View Questions</button>
                                </a>
                                <a href="<?= ROOT; ?>/admin/quiz/add-questions/<?= $data['row'][0]->quiz_id ?>">
                                    <button type="button" class="btn btn-success float-end">Add Questions</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php endif; ?>



<script>
    function display_image(file) {
        let allowedFiles = ['image/jpeg', 'image/png', 'image/webp'];
        if (!allowedFiles.includes(file.type)) {
            alert("Invalid file type, only " + allowedFiles.toString().replaceAll("image/", "") + " files are allowed!");
            return;
        }
        document.querySelector(".js-image-preview").src = URL.createObjectURL(file);
    }
</script>
<?php $this->view("admin/admin.footer"); ?>