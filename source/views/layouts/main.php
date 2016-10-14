<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Account;
use app\models\Log;

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
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
	$log=new Log();
	$guest=true;
	if($log=Log::find()->count()>0)
	{
		$guest=false;
		$log=Log::find()->where(['user_ip'=>Yii::$app->getRequest()->getUserIP()])->one();
	}
	if(!$log)
	{
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'items' => [
				['label' => 'Home', 'url' => ['/vicevi/index']],
				['label' => 'Register', 'url' => ['vicevi/register']],
				['label' => 'Login', 'url' => ['/vicevi/login']],
			],
		]);
	}
	else
	{
		if($log->acLog->userRole->title=='admin')
		{
			echo Nav::widget([
				'options' => ['class' => 'navbar-nav navbar-right'],
				'items' => [
					['label' => 'Home', 'url' => ['/vicevi/index']],
					['label' => 'Profile', 'url' => ['/vicevi/admin']],
					['label' => 'Manage accounts', 'url' => ['/vicevi/accounts']],
					['label' => 'Manage jokes', 'url' => ['/vicevi/jokes']],
					['label' => 'Manage comments', 'url' => ['/vicevi/comments']],
					['label' => 'Logout', 'url' => ['/vicevi/logout','id' => $log->acLog->id]],
				],
			]);
		}
		else if($log->acLog->userRole->title=='moderator')
		{
			echo Nav::widget([
				'options' => ['class' => 'navbar-nav navbar-right'],
				'items' => [
					['label' => 'Home', 'url' => ['/vicevi/index']],
					['label' => 'Profile', 'url' => ['/vicevi/moderator']],
					['label' => 'Manage accounts', 'url' => ['/vicevi/accounts']],
					['label' => 'Manage jokes', 'url' => ['/vicevi/jokes']],
					['label' => 'Manage comments', 'url' => ['/vicevi/comments']],
					['label' => 'Logout', 'url' => ['/vicevi/logout','id' => $log->acLog->id]],
				],
			]);
		}
		else
		{
			echo Nav::widget([
				'options' => ['class' => 'navbar-nav navbar-right'],
				'items' => [
					['label' => 'Home', 'url' => ['/vicevi/index']],
					['label' => 'Profile', 'url' => ['/vicevi/user']],
					['label' => 'Logout', 'url' => ['/vicevi/logout','id' => $log->acLog->id]],
				],
			]);
		}
	}
	NavBar::end();
	?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Vicevi <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
