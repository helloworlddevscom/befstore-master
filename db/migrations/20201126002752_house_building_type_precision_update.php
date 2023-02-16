<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class HouseBuildingTypePrecisionUpdate extends AbstractMigration
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
        // Building Type
        $data29 = $this->table('wp_wpdatatable_29');
        $data29->changeColumn('fueloilgallonsqft', 'decimal', ['precision' => 18, 'scale' => 9])
            ->changeColumn('natgasccfsqft', 'decimal', ['precision' => 18, 'scale' => 9])
            ->changeColumn('watergallonsqft', 'decimal', ['precision' => 18, 'scale' => 9])
            ->changeColumn('electrickwhsqft', 'decimal', ['precision' => 18, 'scale' => 9])
            ->save();

        // Household Type
        $data30 = $this->table('wp_wpdatatable_30');
        $data30->changeColumn('electrickwhsqft', 'decimal', ['precision' => 18, 'scale' => 9])
            ->changeColumn('fueloilmtsqft', 'decimal', ['precision' => 18, 'scale' => 9])
            ->changeColumn('natgasmtsqft', 'decimal', ['precision' => 18, 'scale' => 9])
            ->changeColumn('propanemtsqft', 'decimal', ['precision' => 18, 'scale' => 9])
            ->save();

    }

}
