<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $css  */
/* @var $model  */

$this->title                   = Yii::t('app', 'Description CSS');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => '/products'];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="brands-update">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'css' => $css,
        'model' => $model,
    ]) ?>

</div>
