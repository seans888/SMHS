<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sub_cat".
 *
 * @property integer $id
 * @property string $sub_category
 * @property integer $category_id
 *
 * @property Category $category
 */
class SubCat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_cat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id'], 'required'],
            [['category_id'], 'integer'],
            [['sub_category'], 'string', 'max' => 45],
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
            'sub_category' => 'Sub Category',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }


 /*   public function acttionLists($id)
    {
        $countSubCat = SubCat::find()
            ->where(['id' => $id])
            -count();

        $SubCat = SubCat::find()
            ->where(['id' => $id])
            ->all();

        if($countSubCat > 0) {

            foreach($SubCat as $subcat) {
                echo "<option value'".$subcat->id."'>".$subcat->sub_category."</option>";
            }
        } else {
            echo "<option>.</option>";
        }
    }

  /*  public static function getSubCatList($id)
    {
        $subCategories = self::find()
            ->select(['id', 'sub_category'])
            ->where(['category_id' => $id])
            ->asArray()
            ->all();


            return $subCategories;

    }
    */
}
