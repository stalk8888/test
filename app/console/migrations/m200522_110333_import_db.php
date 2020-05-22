<?php

use yii\db\Migration;

/**
 * Импорт бд из sql файла.
 */
class m200522_110333_import_db extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$sql = file_get_contents(__DIR__ . '/test.sql');
		$command = Yii::$app->db->createCommand($sql);
		$command->execute();
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return false;
    }
}
