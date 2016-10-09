<?php

	namespace app\models;

	use Yii;
	use yii\db\ActiveRecord;

	class State extends ActiveRecord
	{
		public static function tableName()
		{
			return 'state';
		}
		public function rules()
		{
			return [
				[['id','state'], 'required'],
				[['id'],'integer'],
				[['state'], 'string'],
			];
		}
	}
?>