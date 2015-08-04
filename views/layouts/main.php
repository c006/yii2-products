<?php

/* @var $this \yii\web\View */
/* @var $content string */

use c006\products\assets\ProductsMenu;
use frontend\assets\NavMenu;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- Site -->
    <link rel="stylesheet" href="/css/site.css?<?= time() ?>"/>
    <!-- Layout -->
    <link rel="stylesheet" href="/css/layout.css?<?= time() ?>"/>
    <!-- Products -->
    <link rel="stylesheet" href="/css/products.css?<?= time() ?>"/>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin(NavMenu::mainInit());
    echo Nav::widget(NavMenu::mainItems());
    NavBar::end();
    ?>

    <div class="container">
        <?php
        NavBar::begin(ProductsMenu::mainInit());
        echo Nav::widget(ProductsMenu::mainItems());
        NavBar::end();
        ?>

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= \c006\alerts\Alerts::widget() ?>
        <?= $content ?>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

