<?php

namespace lite\blog\models;

use lite\blog\models\abstracts\PostAbstract;
use lite\blog\models\enums\PostStatus;

class Post extends PostAbstract
{
    /**
     * Find Post by slug
     * @param $slug
     * @return null|static
     */
    public static function findBySlug($slug)
    {
        return static::findOne(['slug' => $slug]);
    }

    /**
     * Find all published posts
     * @return Post[]
     */
    public static function findPublishedPosts(){
        return static::findAll(['status' => PostStatus::PUBLISHED]);
    }
}