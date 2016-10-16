<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use app\models\Account;
	
	$this->title='User Update';
	
	$form=ActiveForm::begin(['action' => '?r=vicevi/accupdate&id='.$user->id]);
	?>
	<?= $form->field($user, 'firstname')->textInput(['value'=>$user->firstname])->label('Firstname')?>
	<?= $form->field($user, 'lastname')->textInput(['value'=>$user->lastname])->label('Lastname')?>
	<?= $form->field($user, 'birth_date')->textInput(['value'=>$user->birth_date])->label('Birth Date')?>
	<?= $form->field($user, 'e_mail')->textInput(['value'=>$user->e_mail])->label('E-mail')?>
	<?= $form->field($user, 'password')->passwordInput(['value'=>$user->password])->label('Password')?>
	<?= $form->field($user, 'role_id')->dropdownList($role,['prompt'=>'Please choose user role:'])->label('User role')?>
	

<?php ActiveForm::end(); ?>