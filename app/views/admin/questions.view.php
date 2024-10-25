<?php

/**
 * Admin dashboard home page
 */
?>
<?php $this->view("admin/admin.header"); ?>

<!-- Single question details in a quiz -->
<?php if ($action === 'question') : ?>


<?php else : ?>

    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        <!-- Search Bar -->
                        <div class="row mb-3">
                            <div class="col-md-2">
                                <h3><?= $action; ?></h3>
                            </div>
                            <div class="col-md-4">
                                <select id="recordSelect" class="form-control text-white" onchange="changeRecordsPerPage()">
                                    <option value="">Show</option>
                                    <option value="10">Show 10</option>
                                    <option value="25">Show 25</option>
                                    <option value="50">Show 50</option>
                                    <option value="all">Show All</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="search" id="searchInput" class="form-control" placeholder="Search table..." onkeyup="liveSearch()">
                                </div>
                            </div>
                        </div>
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-hover text-white">
                            <thead>
                                <tr>
                                    <th class="text-white"> Question</th>
                                    <th class="text-white"> Correct Answer</th>
                                    <th class="text-white"> Date Created</th>
                                    <th class="text-white"> More </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data['rows'])) : ?>
                                    <?php foreach ($data['rows'] as $row) : ?>
                                        <tr>
                                            <td> <?= esc($row->question); ?> </td>
                                            <td> <?= esc($row->correct_answer); ?> </td>
                                            <td> <?= get_date(esc($row->date_created)); ?> </td>
                                            <td>
                                                <a href="<?= ROOT; ?>/admin/question/<?= $row->question_id; ?>" style="text-decoration: none;">
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