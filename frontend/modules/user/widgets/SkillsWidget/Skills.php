<?php

namespace app\modules\user\widgets\SkillsWidget;

use yii\base\Widget;
use app\modules\user\models\ProffessionalSkill;

/**
 * Widget witch show skills
 */
class Skills extends Widget
{
    /** @var string $template Template name witch be view skills */
    public $template = 'default';

    /**
     * {@inheritdoc}
     *
     * @return mixed
     */
    public function run()
    {
        $skills = ProffessionalSkill::find()
            ->where(['active' => 1])
            ->orderBy(['display_order' => SORT_ASC])
            ->all();

        return $this->render($this->template, compact('skills'));
    }
}