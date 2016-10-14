<?php
	namespace app\controllers;
	use Yii;
	use yii\web\Controller;
	use app\models\Account;
	use app\models\Log;
	
	class ViceviController extends Controller
	{
		public function actionIndex()
		{
			return $this->render('index');
		}
		public function actionRegister()
		{
			return $this->render('action',['var1'=>'register']);
		}
		public function actionLogin()
		{
			return $this->render('action',['var1'=>'login']);
		}
		public function actionAccounts()
		{
			return $this->render('manage_accounts');
		}
		public function actionJokes()
		{
			return $this->render('manage_jokes');
		}
		public function actionComments()
		{
			return $this->render('manage_comments');
		}
		public function actionAdmin()
		{
			return $this->render('admin_account');
		}
		public function actionModerator()
		{
			return $this->render('moderator_account');
		}
		public function actionUser()
		{
			return $this->render('user_account');
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
			$log=new Log();
			$account->attributes=\Yii::$app->request->post('Account');
			$log->user_ip=Yii::$app->getRequest()->getUserIP();
			$found=Account::find()->where(['e_mail'=>$account->e_mail])->one();
			$path='index';
			if($found){
				$log->user_id=$found->id;
				$log->save();
				\Yii::$app->getSession()->setFlash('Message', 'Successful login!');
				$found->userRole->title=='admin' ?  $path='admin_account' :
				($found->userRole->title=='moderator' ?  $path='moderator_account' : $path='user_account');
			}
			else
			{
				\Yii::$app->getSession()->setFlash('Message', 'Login has failed!');
			}
			return $this->render($path);
		}
		public function actionLogout()
		{
			$id=Yii::$app->getRequest()->getQueryParam('id');
			$found=Log::findOne(['user_id'=>$id]);
			$found->delete();
			\Yii::$app->getSession()->setFlash('Message', 'Successful logout!');
			return $this->render('index');
		}
	}
?>