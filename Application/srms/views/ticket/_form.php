<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Employee;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Tickets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tickets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category')->dropDownlist(
                                            ArrayHelper::map(Category::find()->all(), 'category_name', 'category_name'),
                                            [
                                                'prompt' => 'Select Category',
                                                'style' => 'width:250px',
                                                'onChange' => '
                                                    $.post("index.php?r=category/lists&id='.'"+$(this).val(), function( data) {
                                                        $( "select#tickets-sub_category" ).html( data );

                                                    });'
                                            ]
                                            
    ); ?>

    <?= $form->field($model, 'sub_category')->textInput(['readOnly' => true]) ?>

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
