<?php

	namespace app\models;

	use Yii;
	use yii\db\ActiveRecord;

	class Fictive_Category extends ActiveRecord
	{
		public static function tableName()
		{
			return 'category_fictive';
		}
	}
?>