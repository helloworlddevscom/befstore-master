<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AirportPrecisionUpdate extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        // Airport table data
        $data24 = $this->table('wp_wpdatatable_24');
        $data24->changeColumn('longitude', 'decimal', ['precision' => 18, 'scale' => 9, 'signed' => 'true'])
                ->changeColumn('latitude', 'decimal', ['precision' => 18, 'scale' => 9, 'signed' => 'true'])
                ->save();
    }
}
