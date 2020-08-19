<?php

/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div style="margin-top: 1%;" class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?= $message ?>
</div>

<script>
    $(document).ready(function() {       
          window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(600, function() {
                $(this).remove();
            });
        }, 3000);
    });
</script>