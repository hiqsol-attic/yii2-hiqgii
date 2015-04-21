<?php
/**
 * @link    http://hiqdev.com/yii2-hiqgii
 * @license http://hiqdev.com/yii2-hiqgii/license
 * @copyright Copyright (c) 2015 HiQDev
 *
 * @var $this yii\web\View
 * @var $generator yii\gii\generators\module\Generator
 */
?>
<?= $generator->getPhpHeader() ?>

namespace <?= $generator->namespace ?>models;

class <?= $Model ?>Search extends <?= $Model ?>
{
    use \hipanel\base\SearchModelTrait;
}
