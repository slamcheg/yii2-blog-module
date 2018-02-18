<?php


namespace lite\blog\models\interfaces;

use yii\db\ActiveQueryInterface;
use yii\db\ActiveRecordInterface;


/**
 * Interface CategoryInterface
 * @package lite\blog\models\interfaces
 */
interface CategoryInterface extends ActiveRecordInterface
{
    /**
     * @return integer
     */
    public function getId();

    /**
     * @return integer
     */
    public function getParentId();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string
     */
    public function getSlug();

    /**
     * @return ActiveQueryInterface
     */
    public function getPosts();
}