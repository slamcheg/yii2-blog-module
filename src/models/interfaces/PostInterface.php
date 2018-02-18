<?php

namespace lite\blog\models\interfaces;

use yii\db\ActiveRecordInterface;

/**
 * Interface PostInterface
 * @package lite\blog\models\interfaces
 *
 */
interface PostInterface extends ActiveRecordInterface
{
    /**
     * @return integer
     */
    public function getId();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return string
     */
    public function getContent();

    /**
     * @return integer
     */
    public function getViews();

    /**
     * @return integer
     */
    public function getAuthorId();

    /**
     * @return integer
     */
    public function getStatus();

    /**
     * @return string
     */
    public function getSlug();

    /**
     * @return integer
     */
    public function getCreatedAt();

    /**
     * @return integer
     */
    public function getUpdatedAt();
}