<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="header navbar-fixed-top">
        <div class="container flex-row sb">
            <div class="flex-row customer-service">
                <div class="customer-service-label">Customer service</div>
                <div class="contact"><?= Html::img('/images/phone.svg', []) ?> 1715</div>
                <div class="contact-time"><?= Html::img('/images/clock.svg', []) ?> E-P 9.00-21.00</div>
            </div>
            <div>
                <?= Yii::$app->user->isGuest ? Html::a('Login', ['/site/login'],
                    ['class' => 'btn btn-primary cs-btn orange-bg less-padding'])

                    : (
                        '<div>'
                        . Html::beginForm(['/site/logout'], 'post')
                        .'<span>Tere,'.Yii::$app->user->identity->username.'</span>&nbsp;&nbsp;'
                        . Html::submitButton(
                            'Logout',
                            ['class' => 'btn btn-primary logout cs-btn orange-bg less-padding']
                        )
                        . Html::endForm()
                        . '</div>'
                    ) ?>
            </div>

        </div>
    </div>
    <?php
    NavBar::begin([
        'brandLabel' => 'CREDITSTAR',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top menu',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
            ['label' => 'Credits', 'url' => 'https://www.creditstar.ee/rus/site/laenud'],
            ['label' => 'Help', 'url' => 'https://www.creditstar.ee/est/site/help'],
            ['label' => 'About', 'url' => 'https://www.creditstar.ee/est/site/firmast']
        ],
    ]);
    NavBar::end();
    ?>
    <div class="navbar-fixed-top sub-menu">
        <div class="container flex-row">
            <?= Html::a('Loans', ['/loan']) ?>
            <?= Html::a('Users', ['/user']) ?>
        </div>
    </div>
    <div class="container content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
