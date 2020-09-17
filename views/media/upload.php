<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use yii\widgets\ActiveForm;

    /* @var $this yii\web\View */
    /* @var $model app\models\Media */
    /* @var $form ActiveForm */

    $this->title = "Upload File";
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-upload">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

        <?= $form->field($model,'filename[]')->fileInput(['multiple'=>true, 'accept'=>'image/*']) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Upload', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- media-upload -->
