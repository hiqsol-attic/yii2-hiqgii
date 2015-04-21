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

use Yii;

class <?= $Model ?> extends \hipanel\base\Model
{

    use \hipanel\base\ModelTrait;

    /**
     * @inheritdoc
     */
    public function rules ()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels ()
    {
        return $this->mergeAttributeLabels([
            'remoteid'              => Yii::t('app', 'Remote ID'),
        ]);
    }
}
