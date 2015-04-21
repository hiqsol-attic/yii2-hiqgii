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
use hipanel\widgets\Pjax;
use yii\helpers\Html;

$this->title                   = Html::encode($model->domain);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Domains'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

<?= "?>\n" ?>

<?= "<?" ?> Pjax::begin(Yii::$app->params['pjax']) <?= "?>\n" ?>
<div class="row">

<div class="col-md-4">
    <?= "<?= $Model" ?>GridView::detailView([
        'model'   => $model,
        'columns' => [
            'seller_id','client_id',
            ['attribute' => '<?= $model ?>'],
        ],
    ]) <?= "?>\n" ?>
</div>

</div>
<?= "<?php Pjax::end() ?>\n" ?>
