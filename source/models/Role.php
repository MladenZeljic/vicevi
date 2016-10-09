<?php

	namespace app\models;

	use Yii;
	use yii\db\ActiveRecord;

	class Role extends ActiveRecord
	{
		public static function tableName()
		{
			return 'role';
		}
		public function rules()
		{
			return [
				[['title'], 'required', 'string'],
			];
		}
	}
?>