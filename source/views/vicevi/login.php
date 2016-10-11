<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use app\models\Account;
	
	$user=new Account();
	
	$form=ActiveForm::begin(['action' => '?r=vicevi/acclogin']);?>
	<?= $form->field($user, 'e_mail')->textInput()->label('E-mail')?>
	<?= $form->field($user, 'password')->textInput()->label('Password')?>
	<?= Html::submitButton('LogIn') ?>

<?php ActiveForm::end(); ?>