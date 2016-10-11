<?php

	namespace app\controllers;

	use Yii;
	use yii\web\Controller;
	use app\models\Account;
	
	class ViceviController extends Controller
	{
		public function actionIndex()
		{
			return $this->render('index');
		}
		public function actionRegister()
		{
			return $this->render('register');
		}
		public function actionAccregist()
		{
			$account=new Account(['scenario' => Account::SCENARIO_REGISTER]);
			$account->attributes = \Yii::$app->request->post('Account');
			$account->birth_date=date('Y-m-d', strtotime($account->birth_date));
			$account->role_id=3;
			$account->user_status=1;
			$account->id=Account::find()->orderBy(['id' => SORT_DESC])->one()->id+1;
			$account->save();
			return $this->render('index');
		}
		public function actionLogin()
		{
			return $this->render('login');
		}
		public function actionAcclogin()
		{
			$account=new Account(['scenario' => Account::SCENARIO_LOGIN]);
			$account->attributes=\Yii::$app->request->post('Account');
			$found=Account::findOne(['e_mail'=>$account->e_mail,'password' =>$account->password,]);
			$path='index';
			if($found){
				\Yii::$app->getSession()->setFlash('Poruka', 'Uspiješan login!');
				$path='account';
			}
			else
			{
				\Yii::$app->getSession()->setFlash('Poruka', 'Pogrešan unos!');
			}
			return $this->render($path);
		}
		
	}
?>