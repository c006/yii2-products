Yii2 produts
===================




Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

`
php composer.phar require --prefer-dist "c006/yii2-produts" "dev-master"
`

or add

`
"c006/yii2-produts": "dev-master"
`

to the require section of your `composer.json` file.



Composer.json
------------

>
    "repositories": [
        {
          "type": "vcs",
          "url": "https://github.com/c006/yii2-produts.git"
        }
      ]
  
  
  
  
  
Setup
------------
  
>
    'modules'    => [
        'produts'            => [
            'class'     => 'c006\produts\Module',
            'loginPath' => '/account/dashboard',
        ],
    ],




























