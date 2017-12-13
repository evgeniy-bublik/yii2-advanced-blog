<?php

namespace common\models\portfolio;

use Yii;

/**
 * This is the model class for table "{{%portfolio_links_work_to_category}}".
 *
 * @property integer $id
 * @property integer $work_id
 * @property integer $category_id
 *
 * @property Category $category
 * @property Work $work
 */
class LinksWorkToCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%portfolio_links_work_to_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_id', 'category_id'], 'required'],
            [['work_id', 'category_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['work_id'], 'exist', 'skipOnError' => true, 'targetClass' => Work::className(), 'targetAttribute' => ['work_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'work_id' => 'Work ID',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWork()
    {
        return $this->hasOne(Work::className(), ['id' => 'work_id']);
    }
}
