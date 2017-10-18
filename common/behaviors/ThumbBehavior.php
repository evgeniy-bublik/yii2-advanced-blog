<?php

namespace common\behaviors;

/**
 * ThumbBehavior for Yii2
 *
 * @author Elle <elleuz@gmail.com>
 * @version 0.1
 * @package Behaviors for Yii2
 *
 */

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yii\imagine\Image;

class ThumbBehavior extends AttributeBehavior
{
    public $fileAttribute;
    public $thumbsSaveDir;
    public $saveDir;
    public $previewSize = [[50, 50], [150, 150]];

    private $basePath;

    public function init()
    {
        if (empty($this->fileAttribute)) {
            throw new \Exception('fileAttribute must be set');
        }
        if (empty($this->thumbsSaveDir)) {
            throw new \Exception('thumbsSaveDir must be set');
        }
        if (empty($this->saveDir)) {
            throw new \Exception('saveDir must be set');
        }

        $this->basePath = Yii::getAlias('@frontend') . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR;
    }

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'addImages',
            ActiveRecord::EVENT_BEFORE_DELETE => 'deleteImages',
        ];
    }

    public function updateImages()
    {
        $model      = $this->owner;
        $attribute  = $this->fileAttribute;

        if (!empty($model->{$attribute}) && ($model->{$attribute}) !== $model->getOldAttribute($attribute)) {
            $this->deleteImages();
        }
    }

    public function addImages()
    {
        $model      = $this->owner;
        $attribute  = $this->fileAttribute;
        $image      = UploadedFile::getInstance($model, $attribute);

        if (!empty($image)) {
            $this->deleteImages(true);

            $uniqName = Yii::$app->security->generateRandomString() . '.' . $image->getExtension();
            $saveDir  = $this->basePath . $this->saveDir;

            if (!file_exists($saveDir)) {
                mkdir($saveDir, 0777, true);
            }

            if ($image->saveAs($saveDir . $uniqName)) {
                chmod($saveDir . $uniqName, 0777);
                $model->{$attribute} = $uniqName;
                $this->makePreview($uniqName);
            }
        } else {
            $model->{$attribute} = $model->getOldAttribute($attribute);
        }
    }

    public function deleteImages($oldAttribute = false)
    {
        $model      = $this->owner;
        $attribute  = $this->fileAttribute;
        $file       = ($oldAttribute) ? $model->getOldAttribute($attribute) : $model->{$attribute};
        $filePath   = $this->basePath . $this->saveDir . $file;

        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
        }

        $this->removePreview($file);
    }

    public function getImage()
    {
        return $this->owner->{$this->fileAttribute};
    }

    public function getFullImage()
    {
        return DIRECTORY_SEPARATOR . $this->saveDir . $this->getImage();
    }

    public function getPreview($size)
    {
        $model      = $this->owner;
        $attribute  = $this->fileAttribute;

        if (file_exists($this->basePath . $this->thumbsSaveDir . $size[ 0 ] . 'x' . $size[ 1 ] . $model->{$attribute})) {
            return $size[ 0 ] . 'x' . $size[1] . $model->{$attribute};
        } else {
            return false;
        }
    }

    protected function makePreview($file)
    {
        $saveDir = $this->basePath . $this->thumbsSaveDir;

        if (!file_exists($saveDir)) {
            mkdir($saveDir, 0777, true);
        }

        foreach ($this->previewSize as $size) {
            Image::thumbnail($this->basePath . $this->saveDir . $file, $size[0], $size[1])
                ->save($saveDir . $size[0] . 'x' . $size[1] . $file);
            chmod($saveDir . $size[0] . 'x' . $size[1] . $file, 0777);
        }
    }

    protected function removePreview($file)
    {
        $thumbsDirPath = $this->basePath . $this->thumbsSaveDir;

        foreach ($this->previewSize as $size) {
            if (file_exists($thumbsDirPath . $size[ 0 ] . 'x' . $size[ 1 ] . $file)) {
                unlink($thumbsDirPath . $size[ 0 ] . 'x' . $size[ 1 ] . $file);
            }
        }
    }
}