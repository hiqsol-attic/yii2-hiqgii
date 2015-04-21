<?php
/**
 * @link    http://hiqdev.com/yii2-hiqgii
 * @license http://hiqdev.com/yii2-hiqgii/license
 * @copyright Copyright (c) 2015 HiQDev
 *
 * @var $this yii\web\View
 * @var $generator yii\gii\generators\extension\Generator
 */
?>
<?= $generator->getPhpHeader() ?>

namespace <?= substr($generator->namespace, 0, -1) ?>;

/**
 * Your class description
 */
class FirstFile extends \yii\base\Widget
{
    /**
     * @inheritdoc
     */
    public function run ()
    {
        return "Hello!";
    }
}
