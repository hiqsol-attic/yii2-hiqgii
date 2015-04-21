<?php
/**
 * @link    http://hiqdev.com/yii2-hiqgii
 * @license http://hiqdev.com/yii2-hiqgii/license
 * @copyright Copyright (c) 2015 HiQDev
 */

namespace hiqdev\hiqgii\generators\extension;

use Yii;
use yii\web\View;
use yii\gii\CodeFile;

/**
 * Creates general use yii2 extension
 * Usage:
 * ~~~sh
 * ./yii gii/extension --packageName=yii2-thememanager --namespace='hiqdev\thememanager\' --title='Theme Manager for Yii 2' --description='Component and widgets to manage themes' --keywords='theme,manager,yii2,extension'
 * ~~~
 */
class Generator extends \yii\gii\generators\extension\Generator
{
    public $vendorName      = 'hiqdev';
    public $packageName     = 'yii2-';
    public $namespace       = 'hiqdev\\';
    public $type            = 'yii2-extension';
    public $keywords        = 'yii2,extension';
    public $title;
    public $description;
    public $outputPath      = '@app/runtime/tmp-extensions';
    public $license         = 'BSD-3-clause';
    public $authorName      = 'HiQDev team';        /// TODO change rules
    public $authorEmail     = 'team@hiqdev.com';    /// TODO change rules

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'HiQDev General Use Yii 2 Extension Generator';
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return 'Generates: '.implode(',',$this->requiredTemplates());
    }

    /**
     * @inheritdoc
     */
    public function requiredTemplates()
    {
        return ['composer.json', 'FirstFile.php', '.gitignore', 'README.md', 'LICENSE.md', 'CHANGELOG.md'];
    }

    /**
     * @inheritdoc
     */
    public function successMessage()
    {
        $outputPath = realpath(\Yii::getAlias($this->outputPath));
        $output1 = <<<EOD
<p><em>The extension has been generated successfully.</em></p>
<p>To enable it in your application, you need to create a git repository
and require it via composer.</p>
EOD;
        $code1 = <<<EOD
cd {$outputPath}/{$this->packageName}

git init
git add -A
git commit
git remote add origin git@github.com:{$this->vendorName}/{$this->packageName}
git push -u origin master
EOD;
        $output2 = <<<EOD
<p>The next step is just for <em>initial development</em>, skip it if you directly publish the extension on packagist.org</p>
<p>Add the newly created repo to your composer.json.</p>
EOD;
        $code2 = <<<EOD
"repositories":[
    {
        "type": "git",
        "url": "https://path.to/your/repo"
    }
]
EOD;
        $output3 = <<<EOD
<p class="well">Note: You may use the url <code>file://{$outputPath}/{$this->packageName}</code> for testing.</p>
<p>Require the package with composer</p>
EOD;
        $code3 = <<<EOD
composer.phar require {$this->vendorName}/{$this->packageName}:dev-master
EOD;
        $output4 = <<<EOD
<p>And use it in your application.</p>
EOD;
        $code4 = <<<EOD
\\{$this->namespace}AutoloadExample::widget();
EOD;
        $output5 = <<<EOD
<p>When you have finished development register your extension at <a href='https://packagist.org/' target='_blank'>packagist.org</a>.</p>
EOD;

        $return = $output1 . '<pre>' . highlight_string($code1, true) . '</pre>';
        $return .= $output2 . '<pre>' . highlight_string($code2, true) . '</pre>';
        $return .= $output3 . '<pre>' . highlight_string($code3, true) . '</pre>';
        $return .= $output4 . '<pre>' . highlight_string($code4, true) . '</pre>';
        $return .= $output5;

        return $return;
    }

    /**
     * @inheritdoc
     */
    public function generate()
    {
        $files = [];
        $modulePath = $this->getOutputPath() . '/' . $this->packageName;
        $templates = self::requiredTemplates();
        foreach ($templates as $filename) {
            $files[] = new CodeFile(
                $modulePath . '/' . $filename,
                $this->render($filename)
            );
        };

        return $files;
    }

    /**
     * Looks in parent dir too.
     */
    public function render ($template, $params = [])
    {
        $view = new View();
        $params['generator'] = $this;

        $path = $this->getTemplatePath() . '/' . $template;
        if (!file_exists($path)) {
            /// XXX quick solution, better redo
            $class = (new \ReflectionClass($this))->getParentClass();
            $dir = dirname($class->getFileName()) . '/default';
            $path = $dir . '/' . $template;
        };
        return $view->renderFile($path, $params, $this);
    }

    /**
     * PHP header with copyright notice
     */
    public function getPhpHeader ()
    {
        $year = date("Y");
        return <<<EOD
<?php
/**
 * @link    http://hiqdev.com/{$this->packageName}
 * @license http://hiqdev.com/{$this->packageName}/license
 * @copyright Copyright (c) {$year} HiQDev
 */

EOD;
    }

    /**
     * + proprietary
     */
    public function optsLicense()
    {
        $res = parent::optsLicense();
        $res['proprietary'] = 'proprietary';
        return $res;
    }
}
