<?php

namespace ivankff\yii2ModalAjax;

use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;
use yii\web\AssetBundle;

/**
 * @author John Martin <john.itvn@gmail.com>
 * @since 1.0
 */
class CrudAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/assets';

    public $css = [
        'css/ajaxcrud.css'
    ];
    public $js = [
        'js/ModalRemote.js',
        'js/ajaxcrud.js',
    ];
    public $depends = [
    ];

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $isBs4 = StringHelper::startsWith(ArrayHelper::getValue(\Yii::$app->params, 'bsVersion', ''), '4.');
        $isBs5 = StringHelper::startsWith(ArrayHelper::getValue(\Yii::$app->params, 'bsVersion', ''), '5.');

        array_push($this->depends, 'yii\web\YiiAsset');
        if ($isBs5){
            array_push($this->depends, 'yii\bootstrap5\BootstrapAsset');
            array_push($this->depends, 'yii\bootstrap5\BootstrapPluginAsset');
        }
        else{
            if ($isBs5){
                array_push($this->depends, 'yii\bootstrap4\BootstrapAsset');
                array_push($this->depends, 'yii\bootstrap4\BootstrapPluginAsset');
            }
            else{
                array_push($this->depends, 'yii\bootstrap\BootstrapAsset');
                array_push($this->depends, 'yii\bootstrap\BootstrapPluginAsset');
            }
        }
        array_push($this->depends, 'kartik\grid\GridViewAsset');
        array_push($this->depends, 'ivankff\yii2ModalAjax\JqueryFormAsset');
    }

}
