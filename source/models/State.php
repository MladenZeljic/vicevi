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
				[['state'], 'required', 'string'],
			];
		}
	}
?>