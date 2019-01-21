<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\Films;
use frontend\models\forms\SearchFilms;

/* @var $searchFilmsForm SearchFilms */
/* @var $schedule Films[] */

$this->title = 'Films schedule';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Schedule</h1>
        <p class="lead">Select dates for search:</p>
        <?php $form = ActiveForm::begin([
            'method' => 'get',
            'action' => '/',
            'fieldConfig' => [
                'template' => '{label}{input}{error}',
            ],
        ]);?>
            <?=$form->field($searchFilmsForm, "from")->textInput(['placeholder' => 'from'])?>
            <?=$form->field($searchFilmsForm, "to")->textInput(['placeholder' => 'to'])?>
            <?=Html::submitButton('Search', ['class' => 'btn btn-primary'])?>
        <?php ActiveForm::end();?>
    </div>

    <div class="body-content">
        <div class="row">
            <?php
            echo '<pre>';
            print_r($schedule);
            echo '</pre>';
            ?>
        </div>
    </div>
</div>
