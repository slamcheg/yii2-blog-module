<?php


namespace lite\blog\models;


use lite\blog\models\abstracts\CategoryAbstract;

class Category extends CategoryAbstract
{
    /**
     * Find Category by slug
     * @param $slug
     * @return null|static
     */
    public static function findBySlug($slug)
    {
        return static::findOne(['slug' => $slug]);
    }
}