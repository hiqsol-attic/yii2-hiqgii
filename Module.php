<?php
/**
 * @link    http://hiqdev.com/yii2-hiqgii
 * @license http://hiqdev.com/yii2-hiqgii/license
 * @copyright Copyright (c) 2015 HiQDev
 */

namespace hiqdev\hiqgii;

/**
 * HiQDev Gii
 */
class Module extends \yii\gii\Module implements \yii\base\BootstrapInterface
{
    /**
     * @inheritdoc
     */
    protected function coreGenerators()
    {
        $res = parent::coreGenerators();
        $res['extension']['class'] = 'hiqdev\hiqgii\generators\extension\Generator';
        return $res;
    }
}
