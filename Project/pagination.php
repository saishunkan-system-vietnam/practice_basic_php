<div id="pagination" class="pagination modal-5">
    <?php
    if ($current_page > 3) {
        $first_page = 1;
    ?>
        <a class="page-item" href="?page=<?= $first_page ?>">First</a>
    <?php
    }
    if ($current_page > 1) {
        $prev_page = $current_page - 1;
    ?>
        <a class="page-item" href="?page=<?= $prev_page ?>">Prev</a>
    <?php }
    ?>
    <?php for ($num = 1; $num <= $totalPages; $num++) { ?>
        <?php if ($num != $current_page) { ?>
            <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
                <a class="page-item" href="?page=<?= $num ?>"><?= $num ?></a>
            <?php } ?>
        <?php } else { ?>
            <strong class="current-page page-item"><?= $num ?></strong>
        <?php } ?>
    <?php } ?>
    <?php
    if ($current_page < $totalPages - 1) {
        $next_page = $current_page + 1;
    ?>
        <a class="page-item" href="?page=<?= $next_page ?>">Next</a>
    <?php
    }
    if ($current_page < $totalPages - 3) {
        $end_page = $totalPages;
    ?>
        <a class="page-item" href="?page=<?= $end_page ?>">Last</a>
    <?php
    }
    ?>
</div>