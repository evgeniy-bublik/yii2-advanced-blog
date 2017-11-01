<?php
namespace common\behaviors;

/**
 * DateTimeBehavior for Yii2
 *
 * @author Elle <elleuz@gmail.com>
 * @version 0.1
 * @package Behaviors for Yii2
 *
 */

use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use \DateTime;

class DateTimeBehavior extends AttributeBehavior
{
    public $dateTimeFields;
    public $dbFormat = 'd-m-Y H:i:s';

    public function init()
    {
        parent::init();

        if (is_string($this->dateTimeFields)) {
            $this->dateTimeFields = explode(',', $this->dateTimeFields);
        }
    }

    public function events()
    {
        return [
            //ActiveRecord::EVENT_AFTER_FIND => 'convertDate',
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'convertDateToDB',
        ];
    }

    /*public function convertDate()
    {
        $this->owner->{$this->dateTimeFields} = date($this->format, strtotime($this->owner->{$this->dateTimeFields}));
    }*/

    public function convertDateToDB()
    {
        foreach ($this->dateTimeFields as $attribute) {
            if (empty($this->owner->{$attribute})) {
                continue;
            }

            $date = new DateTime($this->owner->{$attribute});
            $this->owner->{$attribute} = $date->format($this->dbFormat);
        }
    }
}