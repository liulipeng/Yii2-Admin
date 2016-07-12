<?php


use \izyue\admin\components\Configs;
use yii\db\Migration;

class m160712_034501_create_admin_log extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $table = Configs::instance()->adminLogTable;
        // Check if the table exists
        if ($this->db->schema->getTableSchema($table, true) === null) {
            $this->createTable($table, [
                'id' => $this->primaryKey(),
                'route' => $this->string(255)->notNull(),
                'url' => $this->string(255)->notNull(),
                'user_agent' => $this->string(255)->notNull(),
                'gets' => $this->text(),
                'posts' => $this->text()->notNull(),
                'admin_id' => $this->integer()->notNull(),
                'admin_email' => $this->string(255)->notNull(),
                'ip' => $this->string(255)->notNull(),
                'created_at' => $this->integer()->notNull(),
                'updated_at' => $this->integer()->notNull(),
            ], $tableOptions);
        }
    }
    public function down()
    {
        $userTable = Configs::instance()->adminTable;
        if ($this->db->schema->getTableSchema($userTable, true) !== null) {
            $this->dropTable($userTable);
        }
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
