<?php

namespace app\widgets;

use yii\helpers\ArrayHelper;

use iutbay\yii2kcfinder\KCFinderAsset;
use iutbay\yii2kcfinder\KCFinder;
use Yii;

class CKEditor extends \dosamigos\ckeditor\CKEditor
{

    public $enableKCFinder = true;

    /**
     * Registers CKEditor plugin
     */
    protected function registerPlugin()
    {
        if ($this->enableKCFinder)
        {
            $this->registerKCFinder();
        }

        parent::registerPlugin();
    }

    /**
     * Registers KCFinder
     */
    protected function registerKCFinder()
    {
        $register = KCFinderAsset::register($this->view);
        $kcfinderUrl = $register->baseUrl;

        $browseOptions = [
            'filebrowserBrowseUrl' => $kcfinderUrl . '/browse.php?opener=ckeditor&type=files',
            'filebrowserUploadUrl' => $kcfinderUrl . '/upload.php?opener=ckeditor&type=files',
        ];

        $this->clientOptions = ArrayHelper::merge($browseOptions, $this->clientOptions);

        // kcfinder options
        // http://kcfinder.sunhater.com/install#dynamic
        $kcfOptions = array_merge(KCFinder::$kcfDefaultOptions, [
            'uploadURL' => Yii::getAlias('@web').'/uploads/kcfinder',
            'access' => [
                'files' => [
                    'upload' => true,
                    'delete' => true,
                    'copy' => true,
                    'move' => true,
                    'rename' => true,
                ],
                'dirs' => [
                    'create' => true,
                    'delete' => true,
                    'rename' => true,
                ],
            ],
        ]);

        // Set kcfinder session options
        Yii::$app->session->set('KCFINDER', $kcfOptions);
    }

}