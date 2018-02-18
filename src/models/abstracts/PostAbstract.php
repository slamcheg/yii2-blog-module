<?php

namespace lite\blog\models\abstracts;

use lite\blog\models\enums\PostStatus;
use lite\blog\models\events\PostEvent;
use lite\blog\models\interfaces\PostInterface;
use yii\base\Event;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;

/**
 * Class PostAbstract
 * @package lite\blog\models\abstracts\
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property integer $views
 * @property integer $author_id
 * @property integer $status
 * @property string $slug
 * @property integer $created_at
 * @property integer $updated_at
 *
 */
class PostAbstract extends ActiveRecord implements PostInterface
{
    /**
     * @inheritdoc
     * @return string
     */
    public static function tableName()
    {
        return 'lbm_post';
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function rules()
    {
        return [
            [['id', 'author_id', 'status', 'views', 'created_at', 'updated_at'], 'integer'],
            [['id', 'author_id', 'status', 'views', 'description', 'title', 'content'], 'required'],
            [['description', 'title'], 'string', 'max' => 255],
            [['content'], 'string'],
            ['status', 'default', 'value' => PostStatus::ON_REVIEW]

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
     * @inheritdoc
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                return true;
            }
            $this->onStatusChanged();
            return true;
        }
        return false;
    }

    /**
     * Trigger event on Status Change
     */
    public function onStatusChanged()
    {
        if ($this->getStatus() != $this->getOldAttribute('status')) {
            $event = new class extends Event
            {
                public $status;
            };
            $event->status = $this->status;
            $this->trigger(PostEvent::STATUS_CHANGED, $event);
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getViews(): int
    {
        return $this->views;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->created_at;
    }

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updated_at;
    }

}