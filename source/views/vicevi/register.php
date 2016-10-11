<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use app\models\Account;
	
	$user=new Account();
	
	$form=ActiveForm::begin(['action' => '?r=vicevi/accregist']);?>
	<?= $form->field($user, 'firstname')->textInput()->label('Firstname')?>
	<?= $form->field($user, 'lastname')->textInput()->label('Lastname')?>
	<?= $form->field($user, 'birth_date')->textInput()->label('Birth Date')?>
	<?= $form->field($user, 'e_mail')->textInput()->label('E-mail')?>
	<?= $form->field($user, 'password')->textInput()->label('Password')?>
	<?= Html::submitButton('Register') ?>

<?php ActiveForm::end(); ?>