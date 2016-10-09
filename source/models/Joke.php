<?php

	namespace app\models;

	use Yii;
	use yii\db\ActiveRecord;

	class Joke extends ActiveRecord
	{
		public static function tableName()
		{
			return 'joke';
		}
		public function rules()
		{
			return [
				[['state_id','title', 'content'], 'required','message' => 'Molimo unesite naziv vica i njegov sadrzaj!'],
				[['title', 'content'], 'string'],
			];
		}
		public function getTags()
		{
			return $this->hasMany(Tag::className(), ['joke_id' => 'id']);
		}
		public function getJokeState()
		{
			return $this->hasOne(State::className(), ['id' => 'state_id']);
		}
		public function getCategories()
		{
			return $this->hasMany(Category::className(), ['id' => 'category_id'])
			->viaTable('joke2category', ['joke_id' => 'id']);
		}
	}
?>