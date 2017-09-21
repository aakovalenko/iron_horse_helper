<?php

use yii\db\Migration;

/**
 * Handles the creation of table `maintenance`.
 */
class m170921_062035_create_maintenance_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql')
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%maintenance}}', [
            'id' => $this->primaryKey(),
            'iron_horse_id' => $this->integer(11),
            'date' => $this->integer(11),
            'mileage'=> $this->integer(11)->notNull(),
            'oil' => $this->string(50),
            'gearbox_oil' => $this->string(50), //масло коробки передач
            'hydraulic_oil' => $this->string(50),//масло для гидроусилителя
            'oil_filter'=> $this->string(50),
            'air_filter'=> $this->string(50),
            'brake_fluid' => $this->string(50),//тормозная жидкость
            'coolant' => $this->string(50), //охлаждающая жидкость
            'bulbs' => $this->string(50), //лампочки
            'brake_pads'=> $this->string(50), //тормозные колодки
            'brake_discs' => $this->string(50), //тормозные колодки
            'generator_belt' => $this->string(50), //ремень генератора
            'camshaft_belt' => $this->string(50), //ремень распредвала
            'wheel_rotation' => $this->string(50), //ротация колес
            'tire_pressure' => $this->string(50), //давление в шинах
            'alignment' => $this->string(50), //развал схождение
            'battery' => $this->string(50), //акум
            'spark_plug' => $this->string(50), //свечи зажигания
            'spark_plug_wire' => $this->string(50) //провод свеч зажигания

        ], $tableOptions);

        $this->addForeignKey('horse_maintenance', '{{%maintenance}}', 'iron_horse_id', '{{%iron_horse}}', 'id', 'cascade', 'cascade');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('maintenance');
    }
}
