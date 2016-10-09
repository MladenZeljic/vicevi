<?php

	namespace app\models;

	use Yii;
	use yii\db\ActiveRecord;

	class User extends ActiveRecord
	{
		public static function tableName()
		{
			return 'user';
		}
		public function rules()
		{
			return [
				[['role_id','firstname','lastname','birth_date','e-mail','password','title'], 'required'],
				[['first_name','lastname'], 'string'],
				[['birth_date'], 'date'],
				[['e-mail'], 'email'],
				[['password'],'min'=>6],
			];
		}
	}
?>