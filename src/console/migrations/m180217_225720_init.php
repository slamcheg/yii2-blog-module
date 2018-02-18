<?php

use yii\db\Migration;

/**
 * Class m180217_225720_init
 */
class m180217_225720_init extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('lbm_post', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'slug' => $this->string(255)->notNull(),
            'author_id' => $this->integer()->notNull(),
            'views' => $this->integer()->notNull()
        ], $tableOptions);

        $this->createTable('lbm_category', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'parent_id' => $this->integer(),
            'slug' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createTable('lbm_catgory_post', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'post_id' => $this->integer()->notNull()
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('lbm_post');
        $this->dropTable('lbm_category');
        $this->dropTable('lbm_category_post');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180217_225720_init cannot be reverted.\n";

        return false;
    }
    */
}
