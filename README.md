HiQDev specific Gii
-------------------

- Our specific extension generator
- more later: hipanel plugins & themes

### Installation

As usual, [through composer](https://getcomposer.org/).

### Quick Start

In config:

```php
    'modules' => [
        'gii' => 'hiqdev\hiqgii\Module',
    ],
```

In console:

```sh
./yii gii/extension --packageName=yii2-thememanager --title='Theme Manager for Yii 2' --description='Component and widgets to manage themes' --namespace='hiqdev\thememanager\' --keywords='theme,manager,yii2,extension'
```

For more info see wiki:
https://github.com/hiqdev/yii2-hiqgii/wiki
