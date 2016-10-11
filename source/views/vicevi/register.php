<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use app\models\Account;
	$user=new Account();
	$form=ActiveForm::begin(['action' => '?r=vicevi/']);?>
	<?= $form->field($user, 'firstname')->textInput()->label('Ime')?>
	<?= $form->field($user, 'lastname')->textInput()->label('Prezime')?>
	<?= $form->field($user, 'birth_date')->textInput()->label('Datum rođenja')?>
	<?= $form->field($user, 'e_mail')->textInput()->label('E-mail adresa')?>
	<?= $form->field($user, 'password')->textInput()->label('Šifra')?>
	<?= Html::submitButton('Registruj se') ?>

<?php ActiveForm::end(); ?>