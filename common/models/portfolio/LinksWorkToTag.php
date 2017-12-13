<?php

namespace common\models\portfolio;

use Yii;

/**
 * This is the model class for table "{{%portfolio_links_work_to_tag}}".
 *
 * @property integer $id
 * @property integer $work_id
 * @property integer $tag_id
 *
 * @property Tag $tag
 * @property Work $work
 */
class LinksWorkToTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%portfolio_links_work_to_tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_id', 'tag_id'], 'required'],
            [['work_id', 'tag_id'], 'integer'],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag_id' => 'id']],
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
            'tag_id' => 'Tag ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWork()
    {
        return $this->hasOne(Work::className(), ['id' => 'work_id']);
    }
}
