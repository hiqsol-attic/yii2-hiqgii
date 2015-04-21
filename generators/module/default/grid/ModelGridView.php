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

namespace <?= $generator->namespace ?>grid;

use hipanel\grid\MainColumn;

class <?= $Model ?>GridView extends \hipanel\grid\BoxedGridView
{
    static public function defaultColumns()
    {
        return [
            '<?= $model ?>' => [
                'class'                 => MainColumn::className(),
                'filterAttribute'       => '<?= $model ?>_like',
            ],
        ];
    }
}
