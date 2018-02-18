<?php

namespace lbm\unit\tests;

use lite\blog\models\abstracts\PostAbstract;
use lite\blog\models\Category;
use lite\blog\models\CategoryPost;
use lite\blog\models\Post;
use PHPUnit\Framework\TestCase;

class DbTest extends TestCase
{
    private static $_classList = [
        Post::class,
        Category::class,
        CategoryPost::class
    ];

    /**
     * @before
     */
    public function init()
    {
        require_once dirname(__DIR__) . "/bootstrap.php";
    }

    public function testNotEmpty()
    {
        $tables = \Yii::$app->db->schema->getTableNames();
        $this->assertNotEmpty($tables, 'Tables not created');
        return $tables;
    }

    public function testTableExists()
    {
        $tables = \Yii::$app->db->schema->getTableNames();
        foreach (self::$_classList as $table) {
            $this->assertEquals(in_array($table::tableName(), $tables), true);
        }
    }
}