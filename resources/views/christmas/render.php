<?php
/**
 * The index view for christmas controller
 *
 * @category Views
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */

use Fox\Helpers\Url;

/**
 * @var string $shape
 */

?>

<div class="container-fluid">
    <div class="row justify-content-md-center type-selection">
        <div class="col-6">
            <div class="card shape-render-box">
                <?= $shape; ?>
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center type-selection">
        <a href="<?= Url::to("generator"); ?>">
            <input type="button" class="btn btn-primary" value="Return" />
        </a>
    </div>
</div>