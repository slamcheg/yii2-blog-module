<?php


namespace lite\blog\models;


use yii\db\ActiveRecord;

/**
 * Class CategoryPost
 * @package lite\blog\models
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $post_id
 */
class CategoryPost extends ActiveRecord
{
    public static function tableName()
    {
        return 'lbm_category_post';
    }

    public function rules()
    {
        return [
            [['id', 'category_id', 'post_id'], 'integer'],
            [['category_id', 'post_id'], 'required'],
        ];
    }
}