Yii2 user
===================




Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

`
php composer.phar require --prefer-dist "c006/yii2-user" "dev-master"
`

or add

`
"c006/yii2-user": "dev-master"
`

to the require section of your `composer.json` file.



Composer.json
------------

>
    "repositories": [
        {
          "type": "vcs",
          "url": "https://github.com/c006/yii2-user.git"
        }
      ]
  
  
  
  
  
Setup
------------
  
>
    'modules'    => [
        'user'            => [
            'class'     => 'c006\user\Module',
            'loginPath' => '/account/dashboard',
        ],
    ],



























