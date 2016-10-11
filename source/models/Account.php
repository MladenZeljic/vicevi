<?php

	namespace app\models;

	use Yii;
	use yii\db\ActiveRecord;

	class Account extends ActiveRecord
	{
		const SCENARIO_LOGIN = 'login';
		const SCENARIO_REGISTER = 'register';

		public function scenarios()
		{
			return [
				self::SCENARIO_LOGIN => ['e_mail', 'password'],
				self::SCENARIO_REGISTER => ['id','role_id','firstname','lastname','birth_date','email', 'password','user_status'],
			];
		}
		public static function tableName()
		{
			return 'user';
		}
		
		public function rules()
		{
			return [
				[['firstname','lastname','birth_date','e_mail','password'], 'required'],
				[['firstname','lastname'], 'string'],
				//[['birth_date'], 'date'],
				[['e_mail'], 'email'],
				[['password'],'string','min'=>6],
			];
		}
	}
?>