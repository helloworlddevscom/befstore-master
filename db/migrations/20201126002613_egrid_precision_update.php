<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class EgridPrecisionUpdate extends AbstractMigration
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
        // Egrid_zip code look up table
        $data26 = $this->table('wp_wpdatatable_26');
        $data26->changeColumn('zipcode', 'integer')
            ->save();

        // Egrid_factors
        $data27 = $this->table('wp_wpdatatable_33');
        $data27->changeColumn('carbondioxidelbmwh', 'decimal', ['precision' => 18, 'scale' => 9])
            ->changeColumn('methanelbgwh', 'decimal', ['precision' => 18, 'scale' => 9])
            ->changeColumn('nitrousoxidefactorlbgwh', 'decimal', ['precision' => 18, 'scale' => 9])
            ->changeColumn('estcarbondioxidelbmhw', 'decimal', ['precision' => 18, 'scale' => 9])
            ->save();
    }
}
