<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use app\models\Account;
	
	$user=new Account();
	
	$this->title='Admin account';
	print Yii::$app->session->getFlash('Message');
	?>