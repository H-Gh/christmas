<?php
/**
 * The index view for christmas controller
 *
 * @category Views
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */

use Fox\Helpers\Url;

?>

<div class="container-fluid">
    <form action="<?= Url::to("generator/show"); ?>" method="post">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <div class="form-group">
                    <label for="height">Select the size of your magic:</label>
                    <select class="form-control" name="height" id="height">
                        <option value="5">Small (5 rows)</option>
                        <option value="7">Medium (7 rows)</option>
                        <option value="11">Large (11 rows)</option>
                        <option value="19">Extra Large (15 rows)</option>
                    </select>
                </div>

            </div>
        </div>
        <div class="row justify-content-md-center type-selection">
            <div class="col-3 type">
                <label class="radio-container">
                    <input type="radio" value="tree" checked="checked" name="type">
                    <div class="card">
                        <div class="icon">
                            1
                        </div>
                        <div class="title">
                            Tree
                        </div>
                    </div>
                </label>
            </div>
            <div class="col-3 type">
                <label class="radio-container">
                    <input type="radio" value="star" name="type">
                    <div class="card">
                        <div class="icon">
                            6
                        </div>
                        <div class="title">
                            Star
                        </div>
                    </div>
                </label>
            </div>
        </div>
        <div class="row justify-content-md-center type-selection">
            <button type="submit" class="btn btn-primary">Generate</button>
        </div>
    </form>
</div>