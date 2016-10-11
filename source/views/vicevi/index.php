<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use app\models\Account;
	
	$user=new Account();
	
	print Yii::$app->session->getFlash('Poruka'); 
	
	$form=ActiveForm::begin(['action' => '?r=vicevi/register']);?>
	<?= Html::submitButton('Register') ?>

	<?php ActiveForm::end(); 

	$form=ActiveForm::begin(['action' => '?r=vicevi/login']);?>
	<?= Html::submitButton('LogIn') ?>

	<?php ActiveForm::end(); ?>