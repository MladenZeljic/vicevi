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
				[['id','title'], 'required'],
				[['id'],'integer'],
				[['title'], 'string'],
			];
		}
	}
?>