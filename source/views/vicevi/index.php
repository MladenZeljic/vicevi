<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use app\models\Account;
	
	$user=new Account();
	
	print Yii::$app->session->getFlash('Message'); 
	
	$form=ActiveForm::begin(['action' => '?r=vicevi/redirect&var=register']);?>
	<?= Html::submitButton('Register') ?>

	<?php ActiveForm::end(); 
	$form=ActiveForm::begin(['action' => '?r=vicevi/redirect&var=login']);?>
	<?= Html::submitButton('LogIn') ?>

	<?php ActiveForm::end(); ?>