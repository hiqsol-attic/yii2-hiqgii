<?php
/**
 * @link    http://hiqdev.com/yii2-hiqgii
 * @license http://hiqdev.com/yii2-hiqgii/license
 * @copyright Copyright (c) 2015 HiQDev
 */

namespace hiqdev\hiqgii;

/**
 * HiQDev Specific Gii
 *
 * Basic usage: in config:
 * ~~~
 *     'modules' => [
 *         'gii' => 'hiqdev\hiqgii\Module',
 *     ],
 * ~~~
 *
 * In console:
 * ~~~
 * ./yii gii/extension --packageName=yii2-thememanager --title='Theme Manager for Yii 2' --description='Component and widgets to manage themes' --namespace='hiqdev\thememanager\' --keywords='theme,manager,yii2,extension'
 * ~~~
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
