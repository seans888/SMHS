
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use kartik\grid\Module;
use kartik\datetime\DateTimePicker;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\date\DatePicker;
use app\models\Category;


/* @var $this yii\web\View */
/* @var $searchModel app\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tickets-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tickets', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


     <?php

        $gridColumns = [
        'id',
        'request_title',
        'status',
        'category',
        'time_start',
        'time_end'

        ];

        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns

            ])  ;

    

    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model) {

            if($model->status == 'On Going')
            {
                return ['class' => 'danger'];
            } else if($model->status == 'Done') {

                return ['class' => 'success'];
            } 
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          // 'id',
            'category',
            'sub_category',
            'request_title',
            'status',
             [
                'attribute' => 'time_start',
                'value' => 'time_start',
                'filter' => DatePicker::widget([
                    'model' => $searchModel, 
                    'attribute' => 'time_start',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-m-dd',
                        'todayHighlight' => true
                    ]
                    ]),
            ],
            'time_end',
            // 'details',
            // 'sub_category',
            // 'room_no',
            // 'employee_id',
          /*  [
                'label' => 'Category',
                    'value' => function ($data) {
                        return Category::findOne(['id'=>$data->category_id])->category_name;
                    },
          */  
            // 'category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

