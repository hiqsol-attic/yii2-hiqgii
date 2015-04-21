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

use <?= $generator->namespace ?>grid\<?= $Model ?>GridView;

$this->title                    = Yii::t('app', '<?= $Model ?>s');
$this->params['breadcrumbs'][]  = $this->title;
$this->params['subtitle']       = Yii::$app->request->queryParams ? 'filtered list' : 'full list';

<?= "?>\n" ?>

<?= "<?= $model" ?>GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
        'checkbox',
        'seller_id','client_id',
        '<?= $model ?>'
    ],
]) <?= "?>\n" ?>
