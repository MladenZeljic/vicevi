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
				[['firstname','lastname','birth_date','e_mail','password','role_id'], 'required'],
				[['role_id'],'integer'],
				[['firstname','lastname'], 'string','max'=>30],
				[['e_mail'],'string', 'max'=>50],
				[['e_mail'], 'email'],
				[['password'],'string','min'=>6,'max'=>20],
			];
		}
		public function getLog()
		{
			return $this->hasMany(Log::className(), ['user_id' => 'id' ]);
		}
		public function getUserRole()
		{
			return $this->hasOne(Role::className(),['id'=>'role_id']);
		}
	}
?>