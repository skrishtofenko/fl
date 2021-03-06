<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use frontend\models\forms\SearchFilms;

/* @var $searchFilmsForm SearchFilms */
/* @var $schedule array */

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
            <?=DatePicker::widget([
                'model' => $searchFilmsForm,
                'attribute' => 'from',
                'attribute2' => 'to',
                'options' => ['placeholder' => 'Start date'],
                'options2' => ['placeholder' => 'End date'],
                'type' => DatePicker::TYPE_RANGE,
                'form' => $form,
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'autoclose' => true,
                    'startDate' => date('Y-m-d'),
                ]
            ]);?><br />
            <?=Html::submitButton('Search', ['class' => 'btn btn-success'])?>
        <?php ActiveForm::end();?>
    </div>

    <div class="body-content">
        <div class="row">
            <?php $currentDate = ''?>
            <?php foreach ($schedule['sessions'] as $session):?>
                <?php if($session['session_date'] != $currentDate):?>
                    <?php $currentDate = $session['session_date']?>
                    <h2>Sessions on <?=$currentDate?></h2>
                <?php endif;?>
                <p>
                    <strong><?=$schedule['films'][$session['film_id']]?></strong>
                    <i><?=trim($session['session_time'], '{}')?></i>
                </p>
            <?php endforeach;?>
        </div>
    </div>
</div>
