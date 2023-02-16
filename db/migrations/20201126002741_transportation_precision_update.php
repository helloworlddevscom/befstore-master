<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class TransportationPrecisionUpdate extends AbstractMigration
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
    public function change() {

        // Transportation Table
        $data35 = $this->table('wp_wpdatatable_35');
        $data35->changeColumn('carbondioxidekgmile', 'decimal', ['precision' => 18, 'scale' => 9, 'null' => true])
            ->changeColumn('carbondioxidekgkm', 'decimal', ['precision' => 18, 'scale' => 9, 'null' => true])
            ->changeColumn('methanegmile', 'decimal', ['precision' => 18, 'scale' => 9, 'null' => true])
            ->changeColumn('nitriousoxidegmile', 'decimal', ['precision' => 18, 'scale' => 9, 'null' => true])
            ->save();
    }
}
