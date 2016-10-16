<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use app\models\Account;
	
	$user=new Account();
	
	
	if($var1=='register' or $var1=='repeat')
	{
		$this->title='User Registration';
		if($var1=='repeat'){
			$user=$account;
		}
		$form=ActiveForm::begin(['action' => '?r=vicevi/accregist']);
		?>
		<?= $form->field($user, 'firstname')->textInput(['value'=>$user->firstname])->label('Firstname')?>
		<?= $form->field($user, 'lastname')->textInput(['value'=>$user->lastname])->label('Lastname')?>
		<?= $form->field($user, 'birth_date')->textInput(['value'=>$user->birth_date])->label('Birth Date')?>
		<?php
		$button='Register';		
	}
	else
	{
		$this->title='User Login';
		$form=ActiveForm::begin(['action' => '?r=vicevi/acclogin']);
		$button='LogIn';
	}
	?>
	
	<?= $form->field($user, 'e_mail')->textInput(['value'=>$user->e_mail])->label('E-mail')?>
	<?= Yii::$app->session->getFlash('Message') ?>
	<?= $form->field($user, 'password')->passwordInput(['value'=>$user->password])->label('Password')?>
	

<?php ActiveForm::end(); ?>