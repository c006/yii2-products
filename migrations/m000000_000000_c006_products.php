<?php
use yii\db\Migration;
use yii\db\Schema;

class m000000_000000_c006_products extends Migration
{

    /*
    *  ~ Console command ~
    *
    * php yii migrate --migrationPath=@vendor/c006/yii2-products/migrations
    *
    */
    public function up()
    {

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
                    'column'        => 'VARCHAR(20) NULL DEFAULT \'data\'',
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
                    'id'   => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0      => 'PRIMARY KEY (`id`)',
                    'data' => 'VARCHAR(100) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_groups', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_groups}}', [
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
                    'data'       => 'TINYINT(1) UNSIGNED NOT NULL',
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
                    'data'       => 'DECIMAL(10,2) NOT NULL',
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
                    'data'       => 'CHAR(32) NOT NULL',
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
                    'data'       => 'INT(10) UNSIGNED NOT NULL',
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
                    'data'       => 'VARCHAR(400) NOT NULL',
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
                    'data'       => 'TEXT NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('product_value_url', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%product_value_url}}', [
                    'id'              => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0                 => 'PRIMARY KEY (`id`)',
                    'product_id'      => 'INT(10) UNSIGNED NOT NULL',
                    'symbolic_url_id' => 'INT(10) NOT NULL',
                    'attr_id'         => 'INT(10) NOT NULL DEFAULT \'3\'',
                ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_product_type_id_000', 'product', 'product_type_id', 0);
        $this->createIndex('idx_UNIQUE_name_001', 'product_attr', 'name', 1);
        $this->createIndex('idx_attr_type_id_002', 'product_attr', 'attr_type_id', 0);
        $this->createIndex('idx_attr_id_003', 'product_attr_product_type_link', 'attr_id', 0);
        $this->createIndex('idx_attr_id_004', 'product_attr_product_type_link', 'attr_id', 0);
        $this->createIndex('idx_product_core_type_id_005', 'product_attr_product_type_link', 'product_core_type_id', 0);
        $this->createIndex('idx_UNIQUE_name_006', 'product_attr_value', 'name', 1);
        $this->createIndex('idx_attr_id_007', 'product_attr_value', 'attr_id', 0);
        $this->createIndex('idx_product_id_008', 'product_category', 'product_id', 0);
        $this->createIndex('idx_UNIQUE_data_009', 'product_core_type', 'data', 1);
        $this->createIndex('idx_product_id_010', 'product_groups', 'product_id', 0);
        $this->createIndex('idx_UNIQUE_file_011', 'product_image', 'file', 1);
        $this->createIndex('idx_product_id_012', 'product_image', 'product_id', 0);
        $this->createIndex('idx_product_id_013', 'product_keyword', 'product_id', 0);
        $this->createIndex('idx_product_id_014', 'product_shipping_packaging', 'product_id', 0);
        $this->createIndex('idx_product_id_015', 'product_tag', 'product_id', 0);
        $this->createIndex('idx_UNIQUE_name_016', 'product_type', 'name', 1);
        $this->createIndex('idx_product_core_type_id_017', 'product_type', 'product_core_type_id', 0);
        $this->createIndex('idx_UNIQUE_name_018', 'product_type_section', 'name', 1);
        $this->createIndex('idx_product_type_id_019', 'product_type_section', 'product_type_id', 0);
        $this->createIndex('idx_attr_id_020', 'product_type_section_attr', 'attr_id', 0);
        $this->createIndex('idx_product_type_section_id_021', 'product_type_section_attr', 'product_type_section_id', 0);
        $this->createIndex('idx_product_id_022', 'product_value_bit', 'product_id', 0);
        $this->createIndex('idx_attr_id_023', 'product_value_bit', 'attr_id', 0);
        $this->createIndex('idx_product_id_024', 'product_value_decimal', 'product_id', 0);
        $this->createIndex('idx_attr_id_025', 'product_value_decimal', 'attr_id', 0);
        $this->createIndex('idx_product_id_026', 'product_value_encrypted', 'product_id', 0);
        $this->createIndex('idx_attr_id_027', 'product_value_encrypted', 'attr_id', 0);
        $this->createIndex('idx_product_id_028', 'product_value_integer', 'product_id', 0);
        $this->createIndex('idx_attr_id_029', 'product_value_integer', 'attr_id', 0);
        $this->createIndex('idx_product_id_030', 'product_value_text', 'product_id', 0);
        $this->createIndex('idx_attr_id_031', 'product_value_text', 'attr_id', 0);
        $this->createIndex('idx_product_id_032', 'product_value_text_area', 'product_id', 0);
        $this->createIndex('idx_attr_id_033', 'product_value_text_area', 'attr_id', 0);
        $this->createIndex('idx_product_id_034', 'product_value_url', 'product_id', 0);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_product_type_id_000', '{{%product}}', 'product_type_id', '{{%product_type}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_attr_type_id_001', '{{%product_attr}}', 'attr_type_id', '{{%product_attr_type}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_core_type_id_002', '{{%product_attr_product_type_link}}', 'product_core_type_id', '{{%product_core_type}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_attr_id_003', '{{%product_attr_product_type_link}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_attr_id_004', '{{%product_attr_value}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_id_005', '{{%product_category}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_id_006', '{{%product_groups}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_id_007', '{{%product_image}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_id_008', '{{%product_keyword}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_id_009', '{{%product_shipping_packaging}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_id_010', '{{%product_tag}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_core_type_id_011', '{{%product_type}}', 'product_core_type_id', '{{%product_core_type}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_type_id_012', '{{%product_type_section}}', 'product_type_id', '{{%product_type}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_type_section_id_013', '{{%product_type_section_attr}}', 'product_type_section_id', '{{%product_type_section}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_attr_id_014', '{{%product_type_section_attr}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_id_015', '{{%product_value_bit}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_attr_id_016', '{{%product_value_bit}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_id_017', '{{%product_value_decimal}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_attr_id_018', '{{%product_value_decimal}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_id_019', '{{%product_value_encrypted}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_attr_id_020', '{{%product_value_encrypted}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_id_021', '{{%product_value_integer}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_attr_id_022', '{{%product_value_integer}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_id_023', '{{%product_value_text}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_attr_id_024', '{{%product_value_text}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_id_025', '{{%product_value_text_area}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_attr_id_026', '{{%product_value_text_area}}', 'attr_id', '{{%product_attr}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_product_id_027', '{{%product_value_url}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'NO ACTION');
        $this->execute('SET foreign_key_checks = 1;');

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%product_attr}}', ['id' => '1', 'attr_type_id' => '1', 'label' => 'Name', 'name' => 'core_name', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '2', 'attr_type_id' => '1', 'label' => 'UPC Code', 'name' => 'core_upc', 'default_value' => '', 'is_unique_value' => '1', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '3', 'attr_type_id' => '16', 'label' => 'Product URL', 'name' => 'component_symbolic_url', 'default_value' => '/', 'is_unique_value' => '1', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '4', 'attr_type_id' => '6', 'label' => 'Active', 'name' => 'core_active', 'default_value' => '1', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '5', 'attr_type_id' => '9', 'label' => 'Tier Pricing Component', 'name' => 'component_pricing', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '6', 'attr_type_id' => '10', 'label' => 'Images Component', 'name' => 'component_images', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '7', 'attr_type_id' => '1', 'label' => 'SKU', 'name' => 'core_sku', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '8', 'attr_type_id' => '17', 'label' => 'Categories Component', 'name' => 'component_categories', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '9', 'attr_type_id' => '19', 'label' => 'Meta Keyword', 'name' => 'component_keywords', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '10', 'attr_type_id' => '2', 'label' => 'Meta Description', 'name' => 'core_meta_description', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => 'min-width:90%; min-height:150px;', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '11', 'attr_type_id' => '11', 'label' => 'Tags Component', 'name' => 'component_tags', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '12', 'attr_type_id' => '3', 'label' => 'Quantity', 'name' => 'core_qty', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '13', 'attr_type_id' => '6', 'label' => 'Quantity Active', 'name' => 'core_qty_active', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '14', 'attr_type_id' => '6', 'label' => 'Auto Subtract', 'name' => 'core_qty_decrement', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '15', 'attr_type_id' => '4', 'label' => 'Price', 'name' => 'core_price', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '16', 'attr_type_id' => '4', 'label' => 'Discount', 'name' => 'core_discount', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '17', 'attr_type_id' => '5', 'label' => 'Discount Type', 'name' => 'core_discount_type', 'default_value' => '1', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '18', 'attr_type_id' => '12', 'label' => 'Group Component', 'name' => 'component_group', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '19', 'attr_type_id' => '2', 'label' => 'Description', 'name' => 'core_description', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => 'min-width:90%; min-height:50px;', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '20', 'attr_type_id' => '1', 'label' => 'Admin Search Field', 'name' => 'core_search_field', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '21', 'attr_type_id' => '5', 'label' => 'Display Group', 'name' => 'core_group_display', 'default_value' => '1', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '22', 'attr_type_id' => '4', 'label' => 'Weight', 'name' => 'core_weight', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '23', 'attr_type_id' => '5', 'label' => 'Weight Type', 'name' => 'core_weight_type', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '24', 'attr_type_id' => '4', 'label' => 'Shipping Price Override', 'name' => 'core_shipping_price_override', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '25', 'attr_type_id' => '6', 'label' => 'Shipping Price Override On', 'name' => 'core_shipping_price_override_on', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '26', 'attr_type_id' => '6', 'label' => 'Shipping Oversized Product', 'name' => 'core_shipping_is_oversized', 'default_value' => '0', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '27', 'attr_type_id' => '15', 'label' => 'Shipping Address ID', 'name' => 'component_shipping_address_id', 'default_value' => '1', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '28', 'attr_type_id' => '13', 'label' => 'QR Code', 'name' => 'component_qr_code', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '29', 'attr_type_id' => '14', 'label' => 'Shipping Packaging', 'name' => 'component_shipping_packaging', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_attr}}', ['id' => '30', 'attr_type_id' => '1', 'label' => 'Display Group Dropdown Label', 'name' => 'core_group_display_dropdown_label', 'default_value' => 'Choose Size', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '31', 'attr_type_id' => '1', 'label' => 'Size', 'name' => 'size', 'default_value' => '', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '0']);
        $this->insert('{{%product_attr}}', ['id' => '32', 'attr_type_id' => '6', 'label' => 'Taxable', 'name' => 'core_is_taxable', 'default_value' => '1', 'is_unique_value' => '0', 'css_style' => '', 'hint' => '', 'is_core' => '0', 'is_required' => '1']);
        $this->insert('{{%product_core_type}}', ['id' => '1', 'data' => 'General Product']);
        $this->insert('{{%product_core_type}}', ['id' => '3', 'data' => 'Product Group']);
        $this->insert('{{%product_core_type}}', ['id' => '2', 'data' => 'Product Include']);
        $this->insert('{{%product_core_type}}', ['id' => '4', 'data' => 'Product Sets']);
        $this->insert('{{%product_core_type}}', ['id' => '5', 'data' => 'Service Product']);
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
        $this->execute('DROP TABLE IF EXISTS `product_category`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_core_type`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_groups`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_image`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `product_keyword`');
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


    }
}




