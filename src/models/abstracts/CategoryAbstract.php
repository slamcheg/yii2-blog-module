<?php


namespace lite\blog\models\abstracts;


use lite\blog\models\CategoryPost;
use lite\blog\models\interfaces\CategoryInterface;
use lite\blog\models\Post;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveQueryInterface;
use yii\db\ActiveRecord;

/**
 * Class CategoryAbstract
 * @package lite\blog\models\abstracts
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $slug
 * @property string $title
 *
 * @property Post[] $posts
 */
class CategoryAbstract extends ActiveRecord implements CategoryInterface
{
    public static function tableName()
    {
        return 'lbm_category';
    }

    public function rules()
    {
        return [

            [['id', 'parent_id'], 'integer'],
            [['slug', 'title',], 'string', 'max' => 255],
            [['title', 'parent_id'], 'required']
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title'
            ]
        ];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parent_id;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getPosts()
    {
        return $this
            ->hasMany(Post::className(), ['id' => 'post_id'])
            ->viaTable(CategoryPost::tableName(), ['category_id' => 'id']);
    }
}