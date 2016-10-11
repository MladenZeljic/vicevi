<?php

	namespace app\models;

	use Yii;
	use yii\db\ActiveRecord;

	class Account extends ActiveRecord
	{
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
				//[['e-mail'], 'email'],
				//[['password'],'min'=>6],
			];
		}
	}
?>