<?php

	namespace app\models;

	use Yii;
	use yii\db\ActiveRecord;

	class Category extends ActiveRecord
	{
		public static function tableName()
		{
			return 'category';
		}
		public function rules()
		{
			return [
				[['sort_key','title'], 'required','message' => 'Molimo unesite naziv kategorije!'],
				[['sort_key'],'integer'],
				[['title', 'description','picture_link'], 'string'],
			];
		}
		public function getCategoryState()
		{
			return $this->hasOne(State::className(), ['id' => 'state_id']);
		}
		public function getJokes()
		{
			return $this->hasMany(Joke::className(), ['id' => 'joke_id'])
			->viaTable('joke2category', ['category_id' => 'id']);
		}
	}
?>