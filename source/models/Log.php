<?php
	namespace app\models;
	
	use Yii;
	use yii\db\ActiveRecord;
	
	class Log extends ActiveRecord
	{
		public static function tableName()
		{
			return 'log';
		}
		public function getAcLog()
		{
			return $this->hasOne(Account::className(), ['id' => 'user_id']);
		}
	}
?>