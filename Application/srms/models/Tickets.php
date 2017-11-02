<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tickets".
 *
 * @property integer $id
 * @property string $request_title
 * @property string $status
 * @property string $time_start
 * @property string $time_end
 * @property string $details
 * @property string $category
 * @property string $sub_category
 * @property string $room_no
 * @property integer $employee_id
 * @property integer $category_id
 *
 * @property Employee $employee
 * @property Category $category0
 */
class Tickets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tickets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time_start', 'time_end'], 'safe'],
            [['employee_id',], 'required'],
            [['employee_id', 'category_id'], 'integer'],
            [['request_title', 'status', 'details', 'category', 'sub_category'], 'string', 'max' => 45],
            [['room_no'], 'string', 'max' => 11],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_title' => 'Request Title',
            'status' => 'Status',
            'time_start' => 'Time Start',
            'time_end' => 'Time End',
            'details' => 'Details',
            'category' => 'Category',
            'sub_category' => 'Sub Category',
            'room_no' => 'Room No',
            'employee_id' => 'Employee ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
