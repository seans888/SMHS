<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Employee;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use app\models\Category;
use app\models\SubCat;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Tickets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tickets-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'category')->dropDownlist(['Housekeeping Services' => 'Housekeeping Services', 'Engineering Services' =>
                                                        'Engineering Services', 'Food and Beverages' => 'Food and Beverages'], ['prompt' => 'Select a Category']) ?>
    <?= $form->field($model, 'sub_category')->dropDownlist(
                                        ArrayHelper::map(SubCat::find()->all(), 'sub_category', 'sub_category'),
                                        [
                                            'prompt' => 'Select Sub Category',
                                        

    ]); ?>

    <?= $form->field($model, 'request_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['readOnly' => true, 'style' => 'width:200px']) ?>

    <?= $form->field($model, 'time_start')->textInput(['readOnly' => true, 'style' => 'width:200px']) ?>

    <?= $form->field($model, 'time_end')->textInput(['readOnly' => true, 'style' => 'width:200px']) ?>

    <?= $form->field($model, 'details')->textArea(['rows' => 5]) ?>

    <?= $form->field($model, 'room_no')->textInput(['maxlength' => true, 'style' => 'width:200px']) ?>

    <?= $form->field($model, 'employee_id')->dropDownlist(
                                                ArrayHelper::map(Employee::find()->all(), 'id', 'employee_name'),
                                                [
                                                    'prompt' => 'Select Employee ID',
                                                    'style' => 'width:200px'
                                                ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>