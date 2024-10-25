<?php

/**
 * Admin dashboard: category page
 */
?>
<?php $this->view("admin/admin.header"); ?>

<?php if ($action === 'edit') : ?>

<?php elseif ($action === 'delete') : ?>

<?php else : ?>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        Question Details
                    </h2>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="card">
                                    <h3 class="text-white"><?= esc($row->question); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php if (!empty($options)) : ?>
                            <?php foreach ($options as $option) : ?>

                                <div class="col-lg-3">
                                    <ul class="m-3">
                                        <li><?= esc($option->question_option); ?></li>
                                    </ul>
                                </div>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <?php if (!empty($row->image)) : ?>
                                <img src="<?= get_image($image->getThumbnail($row->image, 360, 280)); ?>" alt="" class="img-thumbnail mx-auto d-block">
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php $this->view("admin/admin.footer"); ?>