<?php

	namespace app\models;

	use Yii;
	use yii\db\ActiveRecord;

	class Comment extends ActiveRecord
	{
		public static function tableName()
		{
			return 'comment';
		}
		public function rules()
		{
			return [
				[['id','state_id','user_id','joke_id','content','user_nickname'], 'required'],
				[['id'],'integer'],
				[['content'], 'string'],
			];
		}
		public function getJokeComment()
		{
			return $this->hasOne(Joke::className(), ['id' => 'joke_id']);
		}
		public function getUserCommenter()
		{
			return $this->hasOne(User::className(), ['id' => 'user_id']);
		}
		public function getCommentState()
		{
			return $this->hasOne(State::className(), ['id' => 'state_id']);
		}
	}
?>