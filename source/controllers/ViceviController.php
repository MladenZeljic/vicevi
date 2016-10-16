<?php
	namespace app\controllers;
	use Yii;
	use yii\web\Controller;
	use app\models\Account;
	use app\models\Log;
	use app\models\Role;
	
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
		public function actionManage_accounts()
		{
			return $this->render('manage_accounts');
		}
		public function actionJokes($action)
		{
			return $this->render('manage_jokes',['action'=>$action]);
		}
		public function actionComments($action)
		{
			return $this->render('manage_comments',['action'=>$action]);
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
					$account->role_id=3;
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
			$found=Account::find()->where(['e_mail'=>$account->e_mail,'user_status'=>1])->one();
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
		public function actionLogout($id)
		{
			$found=Log::findOne(['user_id'=>$id]);
			($found and $found->delete())? (\Yii::$app->getSession()->setFlash('Message', 'Successful logout!')):
				(\Yii::$app->getSession()->setFlash('Message', 'Unsuccessful logout!'));
			return $this->render('index');
		}
		public function actionView($id)
		{
			$found=Account::find()->where(['id'=>$id])->one();
			($found)? (\Yii::$app->getSession()->setFlash('Message', 'User is found!')):
				(\Yii::$app->getSession()->setFlash('Message', 'User not found!'));
			$found->userRole->title=='admin' ?  $path='admin_account' :
				($found->userRole->title=='moderator' ?  $path='moderator_account' : $path='user_account');
			return $this->render($path);
		}
		public function actionDelete($id)
		{
			$found=Account::findOne(['id'=>$id]);
			($found and $found->delete())? (\Yii::$app->getSession()->setFlash('Message', 'User successfully deleted!')):
				(\Yii::$app->getSession()->setFlash('Message', 'Delete error!'));
			return $this->render('manage_accounts');
		}
		public function actionUpdate($id)
		{
			$found=Account::findOne(['id'=>$id]);
			$roles = Role::find()->select(['id','title'])->indexBy('id')->all();
			$data=array();
			if(!($found and $roles))
			{
				\Yii::$app->getSession()->setFlash('Message', 'Update error!');
			}
			else
			{
				foreach($roles as $role)
				{
					$data[$role->id]=$role->title;
				}
			}
			return $this->render('update_user_account',['user'=>$found,'role'=>$data]);
		}
		public function actionAccupdate($id)
		{
			$account=Account::findOne(['id'=>$id]);
			$account->attributes=\Yii::$app->request->post('Account');
			($account and $account->save())? (\Yii::$app->getSession()->setFlash('Message', 'User successfully updated!')):
				(\Yii::$app->getSession()->setFlash('Message', 'Update error!'));
			return $this->render('manage_accounts');
		}
		public function actionSearch($search)
		{
			echo '<h1>Search not yet implemented</h1>';
			(!$search)?$search='empty string':$search;
			echo '<p>You have entered:'.$search.'</p>';
		}
	}
?>