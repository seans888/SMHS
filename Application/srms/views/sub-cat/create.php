<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SubCat */

$this->title = 'Create Sub Cat';
$this->params['breadcrumbs'][] = ['label' => 'Sub Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-cat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
