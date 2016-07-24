<?php
use yii\db\Migration;

class m000000_000000_c006_products extends Migration
{


    public function up()
    {
        self::down();

        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('product', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product}}', [
                    'id'              => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0                 => 'PRIMARY KEY (`id`)',
                    'store_id'        => 'INT(10) UNSIGNED NOT NULL',
                    'product_type_id' => 'SMALLINT(5) UNSIGNED NOT NULL',
                    'position'        => 'INT(10) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_attr', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_attr}}', [
                    'id'              => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0                 => 'PRIMARY KEY (`id`)',
                    'attr_type_id'    => 'SMALLINT(5) UNSIGNED NOT NULL',
                    'label'           => 'VARCHAR(45) NOT NULL',
                    'name'            => 'VARCHAR(45) NOT NULL',
                    'default_value'   => 'TEXT NULL',
                    'is_unique_value' => 'TINYINT(1) UNSIGNED NOT NULL',
                    'css_style'       => 'VARCHAR(200) NULL',
                    'hint'            => 'TEXT NULL',
                    'is_core'         => 'TINYINT(1) UNSIGNED NOT NULL',
                    'is_required'     => 'TINYINT(1) UNSIGNED NOT NULL',
                    'show_in_specs'   => 'TINYINT(1) UNSIGNED NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_attr_product_type_link', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_attr_product_type_link}}', [
                    'id'                   => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0                      => 'PRIMARY KEY (`id`)',
                    'attr_id'              => 'INT(10) UNSIGNED NOT NULL',
                    'product_core_type_id' => 'INT(10) UNSIGNED NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_attr_type', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_attr_type}}', [
                    'id'            => 'SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0               => 'PRIMARY KEY (`id`)',
                    'name'          => 'VARCHAR(200) NOT NULL',
                    'element'       => 'VARCHAR(45) NOT NULL',
                    'type'          => 'VARCHAR(45) NULL',
                    'description'   => 'TEXT NULL',
                    'value_table'   => 'VARCHAR(40) NULL',
                    'column'        => 'VARCHAR(20) NULL DEFAULT \'value\'',
                    'value_type'    => 'VARCHAR(45) NULL',
                    'is_visible'    => 'TINYINT(1) UNSIGNED NOT NULL DEFAULT \'1\'',
                    'show_in_admin' => 'TINYINT(1) UNSIGNED NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_attr_value', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_attr_value}}', [
                    'id'       => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0          => 'PRIMARY KEY (`id`)',
                    'attr_id'  => 'INT(10) UNSIGNED NOT NULL',
                    'name'     => 'VARCHAR(50) NOT NULL',
                    'value'    => 'VARCHAR(100) NOT NULL',
                    'position' => 'SMALLINT(6) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_auto_ship', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_auto_ship}}', [
                    'id'           => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0              => 'PRIMARY KEY (`id`)',
                    'product_id'   => 'INT(10) UNSIGNED NOT NULL',
                    'auto_ship_id' => 'SMALLINT(5) UNSIGNED NOT NULL',
                    'attr_id'      => 'SMALLINT(6) NOT NULL DEFAULT \'33\'',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_category', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_category}}', [
                    'id'          => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0             => 'PRIMARY KEY (`id`)',
                    'product_id'  => 'INT(10) UNSIGNED NOT NULL',
                    'category_id' => 'INT(10) UNSIGNED NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_core_type', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_core_type}}', [
                    'id'    => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0       => 'PRIMARY KEY (`id`)',
                    'value' => 'VARCHAR(100) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_group', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_group}}', [
                    'id'                 => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0                    => 'PRIMARY KEY (`id`)',
                    'product_id'         => 'INT(10) UNSIGNED NOT NULL',
                    'product_include_id' => 'INT(10) UNSIGNED NOT NULL',
                    'position'           => 'SMALLINT(5) UNSIGNED NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_image', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_image}}', [
                    'id'         => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0            => 'PRIMARY KEY (`id`)',
                    'product_id' => 'INT(10) UNSIGNED NOT NULL',
                    'size'       => 'CHAR(3) NOT NULL',
                    'file'       => 'VARCHAR(45) NULL',
                    'position'   => 'SMALLINT(5) UNSIGNED NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_keyword', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_keyword}}', [
                    'id'         => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0            => 'PRIMARY KEY (`id`)',
                    'product_id' => 'INT(10) UNSIGNED NOT NULL',
                    'keyword_id' => 'INT(10) UNSIGNED NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_packaging', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_packaging}}', [
                    'id'           => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0              => 'PRIMARY KEY (`id`)',
                    'product_id'   => 'INT(10) UNSIGNED NOT NULL',
                    'packaging_id' => 'INT(10) UNSIGNED NOT NULL',
                    'position'     => 'SMALLINT(6) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_price_tier', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_price_tier}}', [
                    'id'            => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0               => 'PRIMARY KEY (`id`)',
                    'product_id'    => 'INT(10) UNSIGNED NOT NULL',
                    'price_tier_id' => 'SMALLINT(5) UNSIGNED NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_rating', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_rating}}', [
                    'id'         => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0            => 'PRIMARY KEY (`id`)',
                    'product_id' => 'INT(11) NOT NULL',
                    'user_id'    => 'INT(11) NOT NULL',
                    'rating'     => 'TINYINT(4) NOT NULL',
                    'timestamp'  => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_review', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_review}}', [
                    'id'         => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0            => 'PRIMARY KEY (`id`)',
                    'product_id' => 'INT(10) UNSIGNED NOT NULL',
                    'user_id'    => 'INT(10) UNSIGNED NOT NULL',
                    'review'     => 'TEXT NOT NULL',
                    'timestamp'  => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_shipping_packaging', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_shipping_packaging}}', [
                    'id'                    => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0                       => 'PRIMARY KEY (`id`)',
                    'product_id'            => 'INT(10) UNSIGNED NOT NULL',
                    'shipping_packaging_id' => 'INT(10) UNSIGNED NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_tag', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_tag}}', [
                    'id'         => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0            => 'PRIMARY KEY (`id`)',
                    'product_id' => 'INT(10) UNSIGNED NOT NULL',
                    'tag_id'     => 'INT(10) UNSIGNED NOT NULL',
                    'position'   => 'SMALLINT(6) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_type', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_type}}', [
                    'id'                   => 'SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0                      => 'PRIMARY KEY (`id`)',
                    'product_core_type_id' => 'INT(10) UNSIGNED NOT NULL',
                    'name'                 => 'VARCHAR(45) NOT NULL',
                    'is_viewable'          => 'TINYINT(1) UNSIGNED NOT NULL DEFAULT \'1\'',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_type_section', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_type_section}}', [
                    'id'              => 'SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0                 => 'PRIMARY KEY (`id`)',
                    'product_type_id' => 'SMALLINT(5) UNSIGNED NOT NULL',
                    'name'            => 'VARCHAR(45) NOT NULL',
                    'position'        => 'SMALLINT(5) UNSIGNED NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_type_section_attr', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_type_section_attr}}', [
                    'id'                      => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0                         => 'PRIMARY KEY (`id`)',
                    'product_type_section_id' => 'SMALLINT(5) UNSIGNED NOT NULL',
                    'attr_id'                 => 'INT(10) UNSIGNED NOT NULL',
                    'position'                => 'SMALLINT(5) UNSIGNED NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_value_bit', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_value_bit}}', [
                    'id'         => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0            => 'PRIMARY KEY (`id`)',
                    'attr_id'    => 'INT(10) UNSIGNED NOT NULL',
                    'product_id' => 'INT(10) UNSIGNED NOT NULL',
                    'value'      => 'TINYINT(1) UNSIGNED NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_value_decimal', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_value_decimal}}', [
                    'id'         => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0            => 'PRIMARY KEY (`id`)',
                    'product_id' => 'INT(10) UNSIGNED NOT NULL',
                    'attr_id'    => 'INT(10) UNSIGNED NOT NULL',
                    'value'      => 'DECIMAL(10,2) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_value_encrypted', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_value_encrypted}}', [
                    'id'         => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0            => 'PRIMARY KEY (`id`)',
                    'product_id' => 'INT(10) UNSIGNED NOT NULL',
                    'attr_id'    => 'INT(10) UNSIGNED NOT NULL',
                    'value'      => 'VARCHAR(100) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_value_integer', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_value_integer}}', [
                    'id'         => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0            => 'PRIMARY KEY (`id`)',
                    'product_id' => 'INT(10) UNSIGNED NOT NULL',
                    'attr_id'    => 'INT(10) UNSIGNED NOT NULL',
                    'value'      => 'INT(10) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_value_text', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_value_text}}', [
                    'id'         => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0            => 'PRIMARY KEY (`id`)',
                    'product_id' => 'INT(10) UNSIGNED NOT NULL',
                    'attr_id'    => 'INT(10) UNSIGNED NOT NULL',
                    'value'      => 'VARCHAR(400) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_value_text_area', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_value_text_area}}', [
                    'id'         => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0            => 'PRIMARY KEY (`id`)',
                    'product_id' => 'INT(10) UNSIGNED NOT NULL',
                    'attr_id'    => 'INT(10) UNSIGNED NOT NULL',
                    'value'      => 'TEXT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_value_url', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_value_url}}', [
                    'id'           => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0              => 'PRIMARY KEY (`id`)',
                    'product_id'   => 'INT(10) UNSIGNED NOT NULL',
                    'alias_url_id' => 'INT(10) NOT NULL',
                    'attr_id'      => 'INT(10) NOT NULL DEFAULT \'3\'',
                    'value'        => 'VARCHAR(100) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('auto_ship', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%auto_ship}}', [
                    'id'     => 'SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0        => 'PRIMARY KEY (`id`)',
                    'name'   => 'VARCHAR(45) NOT NULL',
                    'active' => 'TINYINT(1) UNSIGNED NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('auto_ship_link', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%auto_ship_link}}', [
                    'id'           => 'SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0              => 'PRIMARY KEY (`id`)',
                    'auto_ship_id' => 'SMALLINT(5) UNSIGNED NOT NULL',
                    'duration'     => 'SMALLINT(3) NOT NULL',
                    'type'         => 'VARCHAR(10) NOT NULL',
                    'position'     => 'SMALLINT(6) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('price_tier', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%price_tier}}', [
                    'id'     => 'SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0        => 'PRIMARY KEY (`id`)',
                    'name'   => 'VARCHAR(45) NOT NULL',
                    'active' => 'TINYINT(1) UNSIGNED NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('price_tier_link', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%price_tier_link}}', [
                    'id'            => 'SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0               => 'PRIMARY KEY (`id`)',
                    'price_tier_id' => 'SMALLINT(5) UNSIGNED NOT NULL',
                    'price'         => 'DECIMAL(10,2) NOT NULL',
                    'max_qty'       => 'SMALLINT(6) NOT NULL',
                    'is_percentage' => 'TINYINT(1) UNSIGNED NULL',
                    'position'      => 'SMALLINT(6) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('tags', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%tags}}', [
                    'id'   => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0      => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(100) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        $this->createIndex('idx_product_type_id_0317_00', 'product', 'product_type_id', 0);
        $this->createIndex('idx_UNIQUE_name_0345_01', 'product_attr', 'name', 1);
        $this->createIndex('idx_attr_type_id_0345_02', 'product_attr', 'attr_type_id', 0);
        $this->createIndex('idx_attr_id_0377_03', 'product_attr_product_type_link', 'attr_id', 0);
        $this->createIndex('idx_attr_id_0377_04', 'product_attr_product_type_link', 'attr_id', 0);
        $this->createIndex('idx_product_core_type_id_0377_05', 'product_attr_product_type_link', 'product_core_type_id', 0);
        $this->createIndex('idx_UNIQUE_name_0432_06', 'product_attr_value', 'name', 1);
        $this->createIndex('idx_attr_id_0432_07', 'product_attr_value', 'attr_id', 0);
        $this->createIndex('idx_product_id_0455_08', 'product_auto_ship', 'product_id', 0);
        $this->createIndex('idx_product_id_0475_09', 'product_category', 'product_id', 0);
        $this->createIndex('idx_UNIQUE_value_0495_10', 'product_core_type', 'value', 1);
        $this->createIndex('idx_product_id_0518_11', 'product_group', 'product_id', 0);
        $this->createIndex('idx_UNIQUE_file_054_12', 'product_image', 'file', 1);
        $this->createIndex('idx_product_id_054_13', 'product_image', 'product_id', 0);
        $this->createIndex('idx_product_id_0563_14', 'product_keyword', 'product_id', 0);
        $this->createIndex('idx_product_id_0584_15', 'product_packaging', 'product_id', 0);
        $this->createIndex('idx_product_id_0605_16', 'product_price_tier', 'product_id', 0);
        $this->createIndex('idx_price_tier_id_0605_17', 'product_price_tier', 'price_tier_id', 0);
        $this->createIndex('idx_product_id_0669_18', 'product_shipping_packaging', 'product_id', 0);
        $this->createIndex('idx_product_id_069_19', 'product_tag', 'product_id', 0);
        $this->createIndex('idx_UNIQUE_name_0714_20', 'product_type', 'name', 1);
        $this->createIndex('idx_product_core_type_id_0714_21', 'product_type', 'product_core_type_id', 0);
        $this->createIndex('idx_product_type_id_0736_22', 'product_type_section', 'product_type_id', 0);
        $this->createIndex('idx_attr_id_0761_23', 'product_type_section_attr', 'attr_id', 0);
        $this->createIndex('idx_product_type_section_id_0761_24', 'product_type_section_attr', 'product_type_section_id', 0);
        $this->createIndex('idx_product_id_0789_25', 'product_value_bit', 'product_id', 0);
        $this->createIndex('idx_attr_id_0789_26', 'product_value_bit', 'attr_id', 0);
        $this->createIndex('idx_product_id_0812_27', 'product_value_decimal', 'product_id', 0);
        $this->createIndex('idx_attr_id_0812_28', 'product_value_decimal', 'attr_id', 0);
        $this->createIndex('idx_product_id_0835_29', 'product_value_encrypted', 'product_id', 0);
        $this->createIndex('idx_attr_id_0835_30', 'product_value_encrypted', 'attr_id', 0);
        $this->createIndex('idx_product_id_0856_31', 'product_value_integer', 'product_id', 0);
        $this->createIndex('idx_attr_id_0856_32', 'product_value_integer', 'attr_id', 0);
        $this->createIndex('idx_product_id_0878_33', 'product_value_text', 'product_id', 0);
        $this->createIndex('idx_attr_id_0878_34', 'product_value_text', 'attr_id', 0);
        $this->createIndex('idx_product_id_0902_35', 'product_value_text_area', 'product_id', 0);
        $this->createIndex('idx_attr_id_0902_36', 'product_value_text_area', 'attr_id', 0);
        $this->createIndex('idx_product_id_0924_37', 'product_value_url', 'product_id', 0);
        $this->createIndex('idx_auto_ship_id_4818_00', 'auto_ship_link', 'auto_ship_id', 0);
        $this->createIndex('idx_price_tier_id_0974_00', 'price_tier_link', 'price_tier_id', 0);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_product_type_0313_00', '{{%product}}', 'product_type_id', '{{%product_type}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_attr_type_0341_01', '{{%product_attr}}', 'attr_type_id', '{{%product_attr_type}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_attr_0372_02', '{{%product_attr_product_type_link}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_core_type_0372_03', '{{%product_attr_product_type_link}}', 'product_core_type_id', '{{%product_core_type}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_attr_0428_04', '{{%product_attr_value}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_0451_05', '{{%product_auto_ship}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_0471_06', '{{%product_category}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_0514_07', '{{%product_group}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_0536_08', '{{%product_image}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_0559_09', '{{%product_keyword}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_058_010', '{{%product_packaging}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_0601_011', '{{%product_price_tier}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_0665_012', '{{%product_shipping_packaging}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_0686_013', '{{%product_tag}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_core_type_0709_014', '{{%product_type}}', 'product_core_type_id', '{{%product_core_type}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_type_0732_015', '{{%product_type_section}}', 'product_type_id', '{{%product_type}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_attr_0757_016', '{{%product_type_section_attr}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_type_section_0757_017', '{{%product_type_section_attr}}', 'product_type_section_id', '{{%product_type_section}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_0785_018', '{{%product_value_bit}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_attr_0785_019', '{{%product_value_bit}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_0808_020', '{{%product_value_decimal}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_attr_0808_021', '{{%product_value_decimal}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_0831_022', '{{%product_value_encrypted}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_attr_0831_023', '{{%product_value_encrypted}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_0852_024', '{{%product_value_integer}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_attr_0852_025', '{{%product_value_integer}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_0874_026', '{{%product_value_text}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_attr_0874_027', '{{%product_value_text}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_0897_028', '{{%product_value_text_area}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_attr_0897_029', '{{%product_value_text_area}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_0921_030', '{{%product_value_url}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_auto_ship_4814_00', '{{%auto_ship_link}}', 'auto_ship_id', '{{%auto_ship}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_price_tier_0969_00', '{{%price_tier_link}}', 'price_tier_id', '{{%price_tier}}', 'id', 'CASCADE', 'NO ACTION');
        $this->execute('SET foreign_key_checks = 1;');

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%product}}', ['id' => '7', 'store_id' => '0', 'product_type_id' => '9', 'position' => '0']);
        $this->insert('{{%product}}', ['id' => '8', 'store_id' => '0', 'product_type_id' => '9', 'position' => '0']);
        $this->insert('{{%product}}', ['id' => '9', 'store_id' => '0', 'product_type_id' => '9', 'position' => '']);
        $this->insert('{{%product_attr}}', ['id' => '1', 'attr_type_id' => '1', 'label' => 'Name', 'name' => 'core_name', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '2', 'attr_type_id' => '1', 'label' => 'UPC Code', 'name' => 'core_upc', 'default_value' => '', 'is_unique_value' => '1', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0', 'show_in_specs' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '3', 'attr_type_id' => '16', 'label' => 'Product URL', 'name' => 'component_symbolic_url', 'default_value' => '/', 'is_unique_value' => '1', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '4', 'attr_type_id' => '6', 'label' => 'Active', 'name' => 'core_active', 'default_value' => '1', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '5', 'attr_type_id' => '9', 'label' => 'Tier Pricing Component', 'name' => 'component_pricing', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '6', 'attr_type_id' => '10', 'label' => 'Images Component', 'name' => 'component_images', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '7', 'attr_type_id' => '1', 'label' => 'SKU', 'name' => 'core_sku', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '8', 'attr_type_id' => '17', 'label' => 'Categories Component', 'name' => 'component_categories', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '9', 'attr_type_id' => '19', 'label' => 'Meta Keyword', 'name' => 'component_keywords', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => 'First is most most important, last is least', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '10', 'attr_type_id' => '2', 'label' => 'Meta Description', 'name' => 'core_meta_description', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => 'min-width:90%; min-height:150px;', 'hint' => 'Short search engine description', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '11', 'attr_type_id' => '11', 'label' => 'Tags Component', 'name' => 'component_tags', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '12', 'attr_type_id' => '3', 'label' => 'Quantity', 'name' => 'core_qty', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '13', 'attr_type_id' => '6', 'label' => 'Quantity Active', 'name' => 'core_qty_active', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '14', 'attr_type_id' => '6', 'label' => 'Auto Subtract', 'name' => 'core_qty_decrement', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '15', 'attr_type_id' => '4', 'label' => 'Price', 'name' => 'core_price', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '16', 'attr_type_id' => '4', 'label' => 'Discount', 'name' => 'core_discount', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '17', 'attr_type_id' => '5', 'label' => 'Discount Type', 'name' => 'core_discount_type', 'default_value' => '1', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '18', 'attr_type_id' => '12', 'label' => 'Group Component', 'name' => 'component_group', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '19', 'attr_type_id' => '2', 'label' => 'Description', 'name' => 'core_description', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => 'min-width:90%; min-height:50px;', 'hint' => 'Full product description', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '20', 'attr_type_id' => '1', 'label' => 'Admin Search Field', 'name' => 'core_search_field', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '21', 'attr_type_id' => '5', 'label' => 'Display Group', 'name' => 'core_group_display', 'default_value' => '1', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '22', 'attr_type_id' => '4', 'label' => 'Weight', 'name' => 'core_weight', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '23', 'attr_type_id' => '5', 'label' => 'Weight Type', 'name' => 'core_weight_type', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '24', 'attr_type_id' => '4', 'label' => 'Shipping Price Override', 'name' => 'core_shipping_price_override', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '25', 'attr_type_id' => '6', 'label' => 'Shipping Price Override On', 'name' => 'core_shipping_price_override_on', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '26', 'attr_type_id' => '6', 'label' => 'Shipping Oversized Product', 'name' => 'core_shipping_is_oversized', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '27', 'attr_type_id' => '15', 'label' => 'Shipping Address ID', 'name' => 'component_shipping_address_id', 'default_value' => '1', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '28', 'attr_type_id' => '13', 'label' => 'QR Code', 'name' => 'component_qr_code', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '29', 'attr_type_id' => '14', 'label' => 'Shipping Packaging', 'name' => 'component_shipping_packaging', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '30', 'attr_type_id' => '1', 'label' => 'Display Group Dropdown Label', 'name' => 'core_group_display_dropdown_label', 'default_value' => 'Choose Size', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '31', 'attr_type_id' => '1', 'label' => 'Size', 'name' => 'size', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0', 'show_in_specs' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '32', 'attr_type_id' => '6', 'label' => 'Taxable', 'name' => 'core_is_taxable', 'default_value' => '1', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '33', 'attr_type_id' => '20', 'label' => 'Auto Ship', 'name' => 'component_auto_ship', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0', 'show_in_specs' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '34', 'attr_type_id' => '1', 'label' => 'Sub Name', 'name' => 'core_sub_name', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '1', 'is_required' => '0', 'show_in_specs' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '35', 'attr_type_id' => '5', 'label' => 'Bottle Size', 'name' => 'bottle_size', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0', 'show_in_specs' => '1']);
        $this->insert('{{%product_attr_type}}', ['id' => '1', 'name' => 'Text Input', 'element' => 'input', 'type' => 'text', 'description' => '', 'value_table' => 'product_value_text', 'column' => 'value', 'value_type' => 'string', 'is_visible' => '1', 'show_in_admin' => '1']);
        $this->insert('{{%product_attr_type}}', ['id' => '2', 'name' => 'Text Area Input', 'element' => 'textarea', 'type' => '', 'description' => '', 'value_table' => 'product_value_text_area', 'column' => 'value', 'value_type' => 'string', 'is_visible' => '1', 'show_in_admin' => '1']);
        $this->insert('{{%product_attr_type}}', ['id' => '3', 'name' => 'Integer Input', 'element' => 'input', 'type' => 'text', 'description' => '', 'value_table' => 'product_value_integer', 'column' => 'value', 'value_type' => 'integer', 'is_visible' => '1', 'show_in_admin' => '1']);
        $this->insert('{{%product_attr_type}}', ['id' => '4', 'name' => 'Decimal Input', 'element' => 'input', 'type' => 'text', 'description' => '', 'value_table' => 'product_value_decimal', 'column' => 'value', 'value_type' => 'float', 'is_visible' => '1', 'show_in_admin' => '1']);
        $this->insert('{{%product_attr_type}}', ['id' => '5', 'name' => 'Dropdown', 'element' => 'select', 'type' => '', 'description' => '', 'value_table' => 'product_value_text', 'column' => 'value', 'value_type' => 'integer', 'is_visible' => '1', 'show_in_admin' => '1']);
        $this->insert('{{%product_attr_type}}', ['id' => '6', 'name' => 'Checkbox', 'element' => 'input', 'type' => 'checkbox', 'description' => '', 'value_table' => 'product_value_bit', 'column' => 'value', 'value_type' => 'tinyint', 'is_visible' => '1', 'show_in_admin' => '1']);
        $this->insert('{{%product_attr_type}}', ['id' => '7', 'name' => 'Password', 'element' => 'input', 'type' => 'password', 'description' => '', 'value_table' => 'product_value_encrypted', 'column' => 'value', 'value_type' => 'string', 'is_visible' => '1', 'show_in_admin' => '1']);
        $this->insert('{{%product_attr_type}}', ['id' => '8', 'name' => 'File Upload', 'element' => 'input', 'type' => 'file', 'description' => '', 'value_table' => 'product_value_text', 'column' => 'value', 'value_type' => 'string', 'is_visible' => '1', 'show_in_admin' => '0']);
        $this->insert('{{%product_attr_type}}', ['id' => '9', 'name' => 'Component Tier Pricing', 'element' => 'component', 'type' => 'pricing', 'description' => '', 'value_table' => '', 'column' => '', 'value_type' => '', 'is_visible' => '0', 'show_in_admin' => '0']);
        $this->insert('{{%product_attr_type}}', ['id' => '10', 'name' => 'Component Images', 'element' => 'component', 'type' => 'images', 'description' => '', 'value_table' => '', 'column' => '', 'value_type' => '', 'is_visible' => '0', 'show_in_admin' => '0']);
        $this->insert('{{%product_attr_type}}', ['id' => '11', 'name' => 'Component Tags', 'element' => 'component', 'type' => 'tags', 'description' => '', 'value_table' => '', 'column' => '', 'value_type' => '', 'is_visible' => '0', 'show_in_admin' => '0']);
        $this->insert('{{%product_attr_type}}', ['id' => '12', 'name' => 'Component Group', 'element' => 'component', 'type' => 'group', 'description' => '', 'value_table' => '', 'column' => '', 'value_type' => '', 'is_visible' => '0', 'show_in_admin' => '0']);
        $this->insert('{{%product_attr_type}}', ['id' => '13', 'name' => 'Component QR Code', 'element' => 'component', 'type' => 'qr_code', 'description' => '', 'value_table' => '', 'column' => '', 'value_type' => '', 'is_visible' => '0', 'show_in_admin' => '0']);
        $this->insert('{{%product_attr_type}}', ['id' => '14', 'name' => 'Component Shipping Packaging', 'element' => 'component', 'type' => 'shipping_packaging', 'description' => '', 'value_table' => '', 'column' => '', 'value_type' => '', 'is_visible' => '0', 'show_in_admin' => '0']);
        $this->insert('{{%product_attr_type}}', ['id' => '15', 'name' => 'Component Shipping Address', 'element' => 'component', 'type' => 'shipping_address', 'description' => '', 'value_table' => 'product_value_integer', 'column' => 'value', 'value_type' => 'integer', 'is_visible' => '0', 'show_in_admin' => '0']);
        $this->insert('{{%product_attr_type}}', ['id' => '16', 'name' => 'Product URL', 'element' => 'component', 'type' => 'product_url', 'description' => '', 'value_table' => 'product_value_url', 'column' => 'alias_url_id', 'value_type' => 'integer', 'is_visible' => '0', 'show_in_admin' => '1']);
        $this->insert('{{%product_attr_type}}', ['id' => '17', 'name' => 'Component Category', 'element' => 'component', 'type' => 'category', 'description' => '', 'value_table' => 'product_category', 'column' => '', 'value_type' => 'integer', 'is_visible' => '0', 'show_in_admin' => '0']);
        $this->insert('{{%product_attr_type}}', ['id' => '19', 'name' => 'Component Keywords', 'element' => 'component', 'type' => 'keywords', 'description' => '', 'value_table' => '', 'column' => 'value', 'value_type' => 'string', 'is_visible' => '0', 'show_in_admin' => '0']);
        $this->insert('{{%product_attr_type}}', ['id' => '20', 'name' => 'Component Auto Ship', 'element' => 'component', 'type' => 'auto_ship', 'description' => '', 'value_table' => 'product_auto_ship', 'column' => '', 'value_type' => 'integer', 'is_visible' => '0', 'show_in_admin' => '1']);
        $this->insert('{{%product_attr_value}}', ['id' => '1', 'attr_id' => '23', 'name' => 'Lbs', 'value' => '1', 'position' => '1']);
        $this->insert('{{%product_attr_value}}', ['id' => '2', 'attr_id' => '23', 'name' => 'Oz', 'value' => '2', 'position' => '2']);
        $this->insert('{{%product_attr_value}}', ['id' => '3', 'attr_id' => '17', 'name' => 'Amount Off', 'value' => '1', 'position' => '1']);
        $this->insert('{{%product_attr_value}}', ['id' => '4', 'attr_id' => '17', 'name' => 'Percentage Off', 'value' => '2', 'position' => '2']);
        $this->insert('{{%product_attr_value}}', ['id' => '5', 'attr_id' => '17', 'name' => 'This Amount', 'value' => '3', 'position' => '3']);
        $this->insert('{{%product_attr_value}}', ['id' => '6', 'attr_id' => '21', 'name' => 'Dropdown', 'value' => '1', 'position' => '1']);
        $this->insert('{{%product_attr_value}}', ['id' => '7', 'attr_id' => '21', 'name' => 'Images', 'value' => '2', 'position' => '2']);
        $this->insert('{{%product_attr_value}}', ['id' => '8', 'attr_id' => '17', 'name' => 'Off', 'value' => '0', 'position' => '0']);
        $this->insert('{{%product_attr_value}}', ['id' => '9', 'attr_id' => '35', 'name' => '2oz', 'value' => '2oz', 'position' => '0']);
        $this->insert('{{%product_attr_value}}', ['id' => '10', 'attr_id' => '35', 'name' => '1oz', 'value' => '1oz', 'position' => '1']);
        $this->insert('{{%product_attr_value}}', ['id' => '11', 'attr_id' => '35', 'name' => '4oz', 'value' => '4oz', 'position' => '2']);
        $this->insert('{{%product_attr_value}}', ['id' => '12', 'attr_id' => '35', 'name' => '8oz', 'value' => '8oz', 'position' => '3']);
        $this->insert('{{%product_attr_value}}', ['id' => '13', 'attr_id' => '35', 'name' => '0.5oz', 'value' => '0.5oz', 'position' => '4']);
        $this->insert('{{%product_core_type}}', ['id' => '1', 'value' => 'General Product']);
        $this->insert('{{%product_core_type}}', ['id' => '3', 'value' => 'Product Group']);
        $this->insert('{{%product_core_type}}', ['id' => '2', 'value' => 'Product Include']);
        $this->insert('{{%product_core_type}}', ['id' => '4', 'value' => 'Product Sets']);
        $this->insert('{{%product_core_type}}', ['id' => '5', 'value' => 'Service Product']);
        $this->insert('{{%product_type}}', ['id' => '9', 'product_core_type_id' => '1', 'name' => 'Bottle', 'is_viewable' => '1']);
        $this->insert('{{%product_type}}', ['id' => '11', 'product_core_type_id' => '1', 'name' => 'Auto', 'is_viewable' => '1']);
        $this->insert('{{%product_type_section}}', ['id' => '4', 'product_type_id' => '9', 'name' => 'General', 'position' => '1']);
        $this->insert('{{%product_type_section}}', ['id' => '5', 'product_type_id' => '9', 'name' => 'Images', 'position' => '17']);
        $this->insert('{{%product_type_section}}', ['id' => '6', 'product_type_id' => '9', 'name' => 'Pricing', 'position' => '12']);
        $this->insert('{{%product_type_section}}', ['id' => '7', 'product_type_id' => '9', 'name' => 'Quantity', 'position' => '19']);
        $this->insert('{{%product_type_section}}', ['id' => '8', 'product_type_id' => '9', 'name' => 'Weight', 'position' => '23']);
        $this->insert('{{%product_type_section}}', ['id' => '9', 'product_type_id' => '9', 'name' => 'Shipping', 'position' => '26']);
        $this->insert('{{%product_type_section}}', ['id' => '10', 'product_type_id' => '9', 'name' => 'Categories', 'position' => '33']);
        $this->insert('{{%product_type_section}}', ['id' => '11', 'product_type_id' => '9', 'name' => 'Tags', 'position' => '35']);
        $this->insert('{{%product_type_section}}', ['id' => '12', 'product_type_id' => '9', 'name' => 'Meta', 'position' => '37']);
        $this->insert('{{%product_type_section}}', ['id' => '13', 'product_type_id' => '9', 'name' => 'Description', 'position' => '40']);
        $this->insert('{{%product_type_section}}', ['id' => '14', 'product_type_id' => '9', 'name' => 'Tax', 'position' => '42']);
        $this->insert('{{%product_type_section}}', ['id' => '15', 'product_type_id' => '11', 'name' => 'Auto Ship', 'position' => '1']);
        $this->insert('{{%product_type_section}}', ['id' => '16', 'product_type_id' => '11', 'name' => 'General', 'position' => '0']);
        $this->insert('{{%product_type_section}}', ['id' => '17', 'product_type_id' => '11', 'name' => 'Images', 'position' => '2']);
        $this->insert('{{%product_type_section}}', ['id' => '18', 'product_type_id' => '11', 'name' => 'Pricing', 'position' => '3']);
        $this->insert('{{%product_type_section}}', ['id' => '19', 'product_type_id' => '11', 'name' => 'Quantity', 'position' => '4']);
        $this->insert('{{%product_type_section}}', ['id' => '20', 'product_type_id' => '11', 'name' => 'Weight', 'position' => '5']);
        $this->insert('{{%product_type_section}}', ['id' => '21', 'product_type_id' => '11', 'name' => 'Shipping', 'position' => '6']);
        $this->insert('{{%product_type_section}}', ['id' => '22', 'product_type_id' => '11', 'name' => 'Categories', 'position' => '7']);
        $this->insert('{{%product_type_section}}', ['id' => '23', 'product_type_id' => '11', 'name' => 'Tags', 'position' => '8']);
        $this->insert('{{%product_type_section}}', ['id' => '24', 'product_type_id' => '11', 'name' => 'Meta', 'position' => '9']);
        $this->insert('{{%product_type_section}}', ['id' => '25', 'product_type_id' => '11', 'name' => 'Description', 'position' => '10']);
        $this->insert('{{%product_type_section}}', ['id' => '26', 'product_type_id' => '11', 'name' => 'Tax', 'position' => '11']);
        $this->insert('{{%product_type_section}}', ['id' => '27', 'product_type_id' => '9', 'name' => 'URL', 'position' => '10']);
        $this->insert('{{%product_type_section}}', ['id' => '28', 'product_type_id' => '9', 'name' => 'Packaging', 'position' => '31']);
        $this->insert('{{%product_type_section}}', ['id' => '29', 'product_type_id' => '9', 'name' => 'Auto Ship', 'position' => '8']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '1', 'product_type_section_id' => '4', 'attr_id' => '1', 'position' => '2']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '2', 'product_type_section_id' => '4', 'attr_id' => '7', 'position' => '4']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '3', 'product_type_section_id' => '4', 'attr_id' => '20', 'position' => '5']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '4', 'product_type_section_id' => '4', 'attr_id' => '4', 'position' => '7']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '5', 'product_type_section_id' => '5', 'attr_id' => '6', 'position' => '18']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '6', 'product_type_section_id' => '6', 'attr_id' => '15', 'position' => '14']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '7', 'product_type_section_id' => '6', 'attr_id' => '17', 'position' => '15']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '8', 'product_type_section_id' => '6', 'attr_id' => '16', 'position' => '16']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '9', 'product_type_section_id' => '7', 'attr_id' => '13', 'position' => '20']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '10', 'product_type_section_id' => '7', 'attr_id' => '14', 'position' => '21']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '11', 'product_type_section_id' => '7', 'attr_id' => '12', 'position' => '22']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '12', 'product_type_section_id' => '8', 'attr_id' => '23', 'position' => '24']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '13', 'product_type_section_id' => '8', 'attr_id' => '22', 'position' => '25']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '14', 'product_type_section_id' => '9', 'attr_id' => '26', 'position' => '27']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '15', 'product_type_section_id' => '9', 'attr_id' => '25', 'position' => '28']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '16', 'product_type_section_id' => '9', 'attr_id' => '24', 'position' => '29']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '17', 'product_type_section_id' => '9', 'attr_id' => '27', 'position' => '30']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '19', 'product_type_section_id' => '10', 'attr_id' => '8', 'position' => '34']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '20', 'product_type_section_id' => '11', 'attr_id' => '11', 'position' => '36']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '21', 'product_type_section_id' => '12', 'attr_id' => '9', 'position' => '38']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '22', 'product_type_section_id' => '12', 'attr_id' => '10', 'position' => '39']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '23', 'product_type_section_id' => '13', 'attr_id' => '19', 'position' => '41']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '24', 'product_type_section_id' => '14', 'attr_id' => '32', 'position' => '43']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '26', 'product_type_section_id' => '6', 'attr_id' => '5', 'position' => '13']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '27', 'product_type_section_id' => '15', 'attr_id' => '33', 'position' => '0']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '28', 'product_type_section_id' => '16', 'attr_id' => '1', 'position' => '0']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '29', 'product_type_section_id' => '16', 'attr_id' => '7', 'position' => '3']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '30', 'product_type_section_id' => '16', 'attr_id' => '20', 'position' => '4']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '31', 'product_type_section_id' => '16', 'attr_id' => '4', 'position' => '5']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '32', 'product_type_section_id' => '17', 'attr_id' => '6', 'position' => '0']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '33', 'product_type_section_id' => '18', 'attr_id' => '15', 'position' => '1']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '34', 'product_type_section_id' => '18', 'attr_id' => '17', 'position' => '2']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '35', 'product_type_section_id' => '18', 'attr_id' => '16', 'position' => '3']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '36', 'product_type_section_id' => '19', 'attr_id' => '13', 'position' => '0']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '37', 'product_type_section_id' => '19', 'attr_id' => '14', 'position' => '1']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '38', 'product_type_section_id' => '19', 'attr_id' => '12', 'position' => '2']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '39', 'product_type_section_id' => '20', 'attr_id' => '23', 'position' => '0']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '40', 'product_type_section_id' => '20', 'attr_id' => '22', 'position' => '1']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '41', 'product_type_section_id' => '21', 'attr_id' => '26', 'position' => '0']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '42', 'product_type_section_id' => '21', 'attr_id' => '25', 'position' => '1']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '43', 'product_type_section_id' => '21', 'attr_id' => '24', 'position' => '2']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '44', 'product_type_section_id' => '21', 'attr_id' => '27', 'position' => '3']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '45', 'product_type_section_id' => '21', 'attr_id' => '29', 'position' => '4']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '46', 'product_type_section_id' => '22', 'attr_id' => '8', 'position' => '0']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '47', 'product_type_section_id' => '23', 'attr_id' => '11', 'position' => '0']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '48', 'product_type_section_id' => '24', 'attr_id' => '9', 'position' => '0']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '49', 'product_type_section_id' => '24', 'attr_id' => '10', 'position' => '1']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '50', 'product_type_section_id' => '25', 'attr_id' => '19', 'position' => '0']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '51', 'product_type_section_id' => '26', 'attr_id' => '32', 'position' => '0']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '52', 'product_type_section_id' => '27', 'attr_id' => '3', 'position' => '11']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '53', 'product_type_section_id' => '16', 'attr_id' => '3', 'position' => '2']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '54', 'product_type_section_id' => '18', 'attr_id' => '5', 'position' => '0']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '55', 'product_type_section_id' => '4', 'attr_id' => '34', 'position' => '3']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '56', 'product_type_section_id' => '16', 'attr_id' => '34', 'position' => '1']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '58', 'product_type_section_id' => '4', 'attr_id' => '35', 'position' => '6']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '61', 'product_type_section_id' => '29', 'attr_id' => '33', 'position' => '9']);
        $this->insert('{{%product_type_section_attr}}', ['id' => '62', 'product_type_section_id' => '28', 'attr_id' => '29', 'position' => '32']);
        $this->insert('{{%auto_ship}}', ['id' => '10', 'name' => 'Auto Ship - General', 'active' => '1']);
        $this->insert('{{%auto_ship_link}}', ['id' => '11', 'auto_ship_id' => '10', 'duration' => '1', 'type' => 'week', 'position' => '0']);
        $this->insert('{{%auto_ship_link}}', ['id' => '12', 'auto_ship_id' => '10', 'duration' => '2', 'type' => 'month', 'position' => '1']);
        $this->insert('{{%auto_ship_link}}', ['id' => '16', 'auto_ship_id' => '10', 'duration' => '3', 'type' => 'month', 'position' => '2']);
        $this->insert('{{%auto_ship_link}}', ['id' => '22', 'auto_ship_id' => '10', 'duration' => '4', 'type' => 'month', 'position' => '3']);
        $this->execute('SET foreign_key_checks = 1;');

    }

    public function down()
    {

        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_attr`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_attr_product_type_link`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_attr_type`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_attr_value`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_auto_ship`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_category`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_core_type`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_group`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_image`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_keyword`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_packaging`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_price_tier`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_rating`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_review`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_shipping_packaging`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_tag`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_type`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_type_section`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_type_section_attr`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_value_bit`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_value_decimal`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_value_encrypted`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_value_integer`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_value_text`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_value_text_area`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_value_url`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `auto_ship`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `auto_ship_link`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `price_tier`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `price_tier_link`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `tags`');
        $this->execute('SET foreign_key_checks = 1;');
    }
}




