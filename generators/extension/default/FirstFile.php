<?= "<?php\n" ?>
/**
 * @link    http://hiqdev.com/<?= $generator->packageName ?>

 * @license http://hiqdev.com/<?= $generator->packageName ?>/license
 * @copyright Copyright (c) 2015 HiQDev
 */

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
