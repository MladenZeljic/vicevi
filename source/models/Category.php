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
				[['state_id','sort_key','title'], 'required','message' => 'Molimo unesite naziv kategorije!'],
				[['id','sort_key'],'integer'],
				[['title', 'description','picture_link'], 'string'],
			];
		}
		public function getJokes()
		{
			return $this->hasMany(Joke::className(), ['id' => 'joke_id'])
			->viaTable('joke2category', ['category_id' => 'id']);
		}
	}
?>