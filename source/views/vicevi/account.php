<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use app\models\Account;
	
	$user=new Account();
	
	print Yii::$app->session->getFlash('Poruka'); 

	$form=ActiveForm::begin(['action' => '?r=vicevi/']);?>
	<?= Html::submitButton('LogOut') ?>

	<?php ActiveForm::end(); ?>