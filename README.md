yii2-git
========

Módulo que permitirá visualizar repositorios GIT utilizando Yii Framework.

En desarrollo...

[![Latest Stable Version](https://poser.pugx.org/markmarco16/yii2-git/v/stable.svg)](https://packagist.org/packages/markmarco16/yii2-git)
[![Latest Unstable Version](https://poser.pugx.org/markmarco16/yii2-git/v/unstable.svg)](https://packagist.org/packages/markmarco16/yii2-git)
[![Total Downloads](https://poser.pugx.org/markmarco16/yii2-git/downloads.svg)](https://packagist.org/packages/markmarco16/yii2-git) 
[![License](https://poser.pugx.org/markmarco16/yii2-git/license.svg)](https://packagist.org/packages/markmarco16/yii2-git)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/markmarco16/yii2-git/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/markmarco16/yii2-git/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/markmarco16/yii2-git/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/markmarco16/yii2-git/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/markmarco16/yii2-git/badges/build.png?b=master)](https://scrutinizer-ci.com/g/markmarco16/yii2-git/build-status/master)
[![Dependency Status](https://www.versioneye.com/user/projects/54cfb7793ca0840b19000002/badge.svg?style=flat)](https://www.versioneye.com/user/projects/54cfb7793ca0840b19000002)
[![Code Climate](https://codeclimate.com/github/markmarco16/yii2-git/badges/gpa.svg)](https://codeclimate.com/github/markmarco16/yii2-git)
[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)

## Instalación

### Requiere

Git
Yii2
php
funcion exec 

### Composer

La mejor forma de instalar esta extensión es a través de [Composer](http://getcomposer.org/).

Ejecuta

```
php composer.phar require markmarco16/yii2-git "dev-master"
```

o agrega

```
"markmarco16/yii2-git": "dev-master"
```

en la sección de requeridos en tu ```composer.json```


## Uso

Configura este módulo en la configuracion de tu aplicación Yii

```php
<?php
    ......
    'modules' => [
        'git' => [
            'class' => 'markmarco16\git\Module',
            'gitDir' => '/var/git/', //Ruta Adsoluta
            'datetimeFormat' => '%Y-%m-%d %H:%M:%S', //Opcional
            'subjectMaxLength' => 80, //Opcional
        ],
    ],
    ......
```