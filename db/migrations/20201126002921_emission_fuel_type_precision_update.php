<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class EmissionFuelTypePrecisionUpdate extends AbstractMigration
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
        // Emission Factors
        $data31 = $this->table('wp_wpdatatable_31');
        $data31->changeColumn('value', 'decimal', ['precision' => 18, 'scale' => 9])
            ->save();
   }
}
