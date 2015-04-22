<?php
/**
 * @link    http://hiqdev.com/yii2-hiqgii
 * @license http://hiqdev.com/yii2-hiqgii/license
 * @copyright Copyright (c) 2015 HiQDev
 */

namespace hiqdev\hiqgii\generators\module;

use yii\gii\CodeFile;

/**
 * Creates HiPanel module plugin skeleton code
 *
 * Usage:
 * ~~~sh
 * ./yii gii/module --moduleID=finance --title='Finance Plugin for HiPanel' --description='Finance: bill, tariffs and so on' --keywords='finance,hipanel,plugin' --models='Bill,Tariff'
 * ~~~
 */
class Generator extends \hiqdev\hiqgii\generators\extension\Generator
{
    public $moduleID;
    public $models;
    public $keywords        = 'hipanel,plugin';

    /**
     * @inheritdoc
     */
    public function getName ()
    {
        return 'HiPanel Module Plugin Generator';
    }

    /**
     * @inheritdoc
     */
    public function getDescription ()
    {
        return 'This generator helps you to create the skeleton code needed by a HiPanel module plugin.';
    }

    /**
     * @inheritdoc
     */
    public function rules ()
    {
        return array_merge(parent::rules(), [
            [['moduleID', 'models'], 'filter', 'filter' => 'trim'],
            [['moduleID', 'models'], 'required'],
            [['moduleID'], 'match', 'pattern' => '/^[\w\\-]+$/', 'message' => 'Only word characters and dashes are allowed.'],
            [['models'],   'match', 'pattern' => '/^[\w,\\-]+$/', 'message' => 'Only word characters and dashes are allowed.'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels ()
    {
        return [
            'moduleID' => 'Module ID',
            'models' => 'List of models',
        ];
    }

    /**
     * @inheritdoc
     */
    public function hints ()
    {
        return [
            'moduleID' => 'This refers to the ID of the module, e.g., <code>finance</code>.',
            'models' => 'Comma separated list of models to be created in the module, e.g., <code>bill,tariff</code>.',
        ];
    }

    /**
     * @inheritdoc
     */
    public function requiredTemplates ()
    {
        return [
            'Module.php', 'controllers/ModelController.php', 'grid/ModelGridView.php',
            'models/Model.php', 'models/ModelSearch.php', 'views/model/index.php', 'views/model/view.php'
        ];
    }

    /**
     * @inheritdoc
     */
    public function generate ()
    {
        /// TODO put in a proper place
        $this->packageName = 'hipanel-module-'.$this->moduleID;
        $this->namespace = "hipanel\\modules\\{$this->moduleID}\\";

        $files = [];
        $modulePath = $this->getOutputPath() . '/' . $this->packageName;
        $Models = explode(',',$this->models);
        foreach ($Models as $Model) {
            $model = strtolower($Model);
            foreach ($this->requiredTemplates() as $template) {
                $file = str_replace('/Model',"/$Model",$template);
                $file = str_replace('/model',"/$model",$file);
                $files[] = new CodeFile(
                    $modulePath . '/' . $file,
                    $this->render($template,compact('Model','model'))
                );
            };
        };

        return array_merge($files,parent::generate());
    }

}
