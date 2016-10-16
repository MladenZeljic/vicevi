<?php
	use yii\helpers\Html;
	use yii\grid\GridView;
	use yii\widgets\ActiveForm;
	use yii\data\ActiveDataProvider;
	use app\models\Account;
	use app\models\Log;
	
	$user=new Account();
	
	$this->title='Manage active accounts';
	$current_logged_user=Log::find()->where(['user_ip'=>Yii::$app->getRequest()->getUserIP()])->one();
	$query=Account::find()->joinWith('userRole')->where('user.id != :id', ['id'=>$current_logged_user->user_id,]);
	$dataProvider = new ActiveDataProvider([
    'query' => $query,
	]);
	print Yii::$app->session->getFlash('Message');
	?>
	
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
		
		[
            'header' => 'First name',
            'attribute' => 'firstname',
        ],
        [
            'header' => 'Last name',
            'attribute' => 'lastname',
        ],
		'birth_date',
		[
            'header' => 'E-mail',
            'attribute' => 'e_mail',
        ],
		'password',
		[
            'header' => 'User role',
            'attribute' => 'userRole.title',
        ],
		[
            'header' => 'User status',
            'attribute' => function ($account) { return ($account->user_status==1)? 'active':'deactivated'; },
        ],
		['class' => 'yii\grid\ActionColumn'],
		],
	]); 
?>