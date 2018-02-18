<?php


namespace lite\blog\models\enums;

/**
 * Interface PostStatus
 * @package lite\blog\models\enums
 *
 */
interface PostStatus
{
    const ON_REVIEW = 10;
    const PUBLISHED = 20;
    const BLOCKED = 30;
}