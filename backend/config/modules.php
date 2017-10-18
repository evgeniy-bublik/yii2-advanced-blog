<?php
return [
    'core' => [
          'class' => 'app\modules\core\Module',
      ],
      'user' => [
          'class' => 'app\modules\user\Module',
      ],
      'article' => [
          'class' => 'app\modules\article\Module',
      ],
      'redactor' => [
          'class' => 'yii\redactor\RedactorModule',
          'uploadDir' => '@frontend/web/files/article',
          'uploadUrl' => '/files/article',
          'imageAllowExtensions' => ['jpg', 'png', 'gif']
      ],
];
?>