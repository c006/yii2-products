Yii2 Products
===================




Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

`
php composer.phar require --prefer-dist "c006/yii2-products" "*"
`

or add

`
"c006/yii2-products": "*"
`

to the require section of your `composer.json` file.



Composer.json
------------

>
    "repositories": [
        {
          "type": "vcs",
          "url": "https://github.com/c006/yii2-products.git"
        }
      ]
  
  
  
Setup
------------
  
>
    'modules'    => [
        'products'            => [
            'class'     => 'c006\products\Module',
            'loginPath' => '/account/dashboard',
        ],
    ],



Requires
-----------

` php composer.phar require --prefer-dist "c006/yii2-core" "*" `

` php composer.phar require --prefer-dist "c006/yii2-spinner" "*" `

` php composer.phar require --prefer-dist "c006/yii2-alerts" "*" `


























