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
		public function actionRedirect()
		{
			$var1=Yii::$app->getRequest()->getQueryParam('var');
			if($var1=='register'){
				return $this->render('action',['var1'=>$var1]);
			}
			else
			{
				return $this->render('action',['var1'=>$var1]);
			}
		}
		public function actionAccregist()
		{
			$account=new Account();
			if($account->load(Yii::$app->request->post()))
			{	
				$account->birth_date=date('Y-m-d', strtotime($account->birth_date));
				$found=Account::findOne(['e_mail'=>$account->e_mail]);
				if(!$found){
					$account->save();
					Yii::$app->getSession()->setFlash('Message',  'Successful register!');
					return $this->render('index');
				}
				else
				{
					$account->e_mail="";
					Yii::$app->getSession()->setFlash('Message',  'Duplicate e-mail!');
					return $this->render('action',['var1'=>'repeat','account'=>$account]);
				}
			}
		}
		public function actionAcclogin()
		{
			$account=new Account();
			$account->attributes=\Yii::$app->request->post('Account');
			$found=Account::findOne(['e_mail'=>$account->e_mail,'password' =>$account->password,]);
			$path='index';
			if($found){
				$found->user_logged=1;
				$found->save();
				\Yii::$app->getSession()->setFlash('Message', 'Successful login!');
				$path='account';
			}
			else
			{
				\Yii::$app->getSession()->setFlash('Message', 'Login has failed!');
			}
			return $this->render($path);
		}
		public function actionLogout()
		{
			$found=Account::findOne(['user_logged'=>'1',]);
			$found->user_logged=0;
			$found->save();
			\Yii::$app->getSession()->setFlash('Message', 'Successful logout!');
			return $this->render('index');
		}
	}
?>