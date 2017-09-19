<?php

namespace c006\products\assets;

use Yii;

class AppProductAdmin
{


    private $sql = [];

    /**
     * @var array
     */
    private $columns = [];


    private $temp_table = 'temp_';

    private $model;

    private $linked_join = [];
    private $link_join_i = 0;

    private $sort_string = '';

    function __construct($model_class)
    {
        $this->temp_table .= (!Yii::$app->user->isGuest) ? Yii::$app->user->id : "0";
        $this->model = new $model_class();
    }


    public function createSql($where_string = '')
    {

        $connection = \Yii::$app->db;
        $array      = self::bubbleSort($this->columns);
        self::resetColumnArrayKey($array);
        $this->sql['select'] = "";
        $this->sql['join']   = "";

        $sql_temp = "DROP TABLE IF EXISTS `" . $this->temp_table . "`; " . PHP_EOL;
        $sql_temp .= " CREATE TEMPORARY TABLE IF NOT EXISTS `" . $this->temp_table . "` AS (" . PHP_EOL;
        $this->sql['select'] = "SELECT " . PHP_EOL;
        $this->sql['join']   = "";
        foreach ($this->columns as $attribute) {
            //                $table  = ($attribute['table'] == "DEFAULT") ? "`" . $this->model->tableName() . "`." : '';
            $select = ($attribute['select']) ? $attribute['select'] : " `" . $attribute['table'] . "`.`" . $attribute['column'] . "`";
            if (!self::recursiveDataJoin($attribute))
                $this->sql['select'] .= " " . $select . " AS `" . $attribute['alias'] . "`," . PHP_EOL;

            if (isset($attribute['sort']) && !isset($_POST[ $this->session_name ]['sort']) && strtoupper($attribute['sort']) != "NONE" && strtoupper($attribute['sort']) != "")
                $this->sort_string .= " `" . $attribute['schema'] . "`.`" . $attribute['table'] . "`.`" . $attribute['column'] . "` " . $attribute['sort'] . "," . PHP_EOL;
        }
        $this->sql['select'] = substr($this->sql['select'], 0, strlen($this->sql['select']) - 2) . PHP_EOL;
        $sql_from            = " FROM `" . $this->model->tableName() . "`  " . PHP_EOL;
        $this->sql['join']   = substr($this->sql['join'], 0, strlen($this->sql['join']) - 1) . PHP_EOL;
        $sql_temp .= (($this->sql['select'] = "SELECT ") ? "SELECT * " : $this->sql['select']) . $sql_from . $where_string . $this->sql['join'] . ") ";
        /***********************************************************************************************************************************************************************************************************************/
        /***********************************************************************************************************************************************************************************************************************/
        /***********************************************************************************************************************************************************************************************************************/
//        echo $sql_temp;
//        exit;
        $connection->createCommand($sql_temp)->execute();
        /* */
        $this->sql =
            "SELECT *  FROM `" . $this->temp_table . "` `" . $this->model->tableName() . "` WHERE 1 = 1 " . $this->search . PHP_EOL;
        //                        echo $this->sql;
        //                        exit;
        if (!$this->search)
            $count = $connection->createCommand("SELECT Count(*) FROM `" . $this->model->tableName() . "`")->queryColumn();
        else {
            $count = $connection->createCommand("SELECT Count(*) FROM `" . $this->temp_table . "` `" . $this->model->tableName() . "` WHERE 1 = 1 " . $this->search)->queryColumn();
        }
        $count           = (sizeof($count)) ? $count[0] : 0;
        $this->row_count = ceil($count / $this->page_limit);
        /* */
        if ($this->sort_string) {
            if (!isset($_POST[ $this->session_name ]['sort']))
                $this->sort_string = substr($this->sort_string, 0, strlen($this->sort_string) - 2);
            $this->sql .= "ORDER BY " . $this->sort_string . PHP_EOL;
        }
        $this->sql .= " LIMIT " . (((int)$this->page - 1) * $this->page_limit) . "," . $this->page_limit;


    }


    private function bubbleSort($sort_array, $array = [], $column = 'position')
    {
        if (sizeof($array) < 1) {
            foreach ($sort_array as $key => $item) {
                $item['key'] = $key;
                $array[]     = $item;
                unset($sort_array[ $key ]);
                break;
            }
        }
        foreach ($sort_array as $key => $item) {
            $item['key'] = $key;
            for ($i = 0; $i < sizeof($array); $i++) {
                if (floatval($item[ $column ]) >= floatval($array[ $i ][ $column ])) {
                    array_push($array, $item);
                    break;
                } else {
                    array_unshift($array, $item);
                    break;
                }
            }
        }

        return $array;
    }

    private function resetColumnArrayKey($array)
    {
        $this->columns = [];
        foreach ($array as $item) {
            $this->columns[ $item['key'] ] = $item;
            unset($this->columns[ $item['key'] ]['key']);
        }
    }


    public function recursiveDataJoin($column_array)
    {

        $return      = FALSE;
        $linked_join = '';
        $this->link_join_i++;
        if (is_array($this->linked_join)) {
            foreach ($this->linked_join as $key_column => $value_array) {
                if ($key_column == $column_array['column']) {
                    $value_array['parent_column'] = $key_column;
                    $linked_join                  = $value_array;
                    break;
                }
            }
        }
        if (is_array($column_array['link_data'])) {
            $linked_join = $column_array['link_data'];
        }
        if (is_array($linked_join)) {
            /*~ LOOK HERE !!! */
            $linked_array = []; //AppStatic::getTablePkAndModel($linked_join['table']);
            if (!is_array($linked_array))
                die("Problem with table {" . $linked_join['table'] . "} no data link!");
            $schema = ($linked_array['schema']) ? '`' . $linked_array['schema'] . '`.' : '';
            $alias  = 'join_' . $this->link_join_i;
            if ($linked_join['join'] == "ATTRIBUTE") {
                if (isset($linked_join['link_data'])) {
                    $this->sql['join'] .= " LEFT JOIN `" . $linked_join['link_data']['schema'] . "`.`" . $linked_join['link_data']['table'] . "` `" . $alias . "`
                        ON `" . $alias . "`.`" . $linked_join['link_data']['column'] . "` = (
                            SELECT `" . $linked_join['table'] . "`.`" . $linked_join['link_data']['column'] . "`
                            FROM `" . $linked_join['table'] . "`
                            WHERE
                                `" . $linked_join['table'] . "`.`product_id` = `" . $this->model->tableName() . "`.`product_id`
                                AND `" . $linked_join['table'] . "`.`attribute_id` = " . $linked_join['column_id'] . "
                                LIMIT 1
                            )
                        " . PHP_EOL;
                    $this->sql['select'] .= " `" . $alias . "`.`" . $linked_join['link_data']['select'] . "` AS `" . $column_array['column'] . "`," . PHP_EOL;
                } else {
                    $this->sql['join'] .= " LEFT JOIN " . $schema . "`" . $linked_join['table'] . "` `" . $alias . "`
                        ON `" . $alias . "`.`" . $linked_array['pk'] . "` =
                            ( SELECT `" . $linked_join['table'] . "`.`" . $linked_array['pk'] . "`
                            FROM `" . $linked_join['table'] . "`
                            WHERE
                                `" . $linked_join['table'] . "`.`product_id` = `" . $this->model->tableName() . "`.`product_id`
                                AND `" . $linked_join['table'] . "`.`attribute_id` = " . $linked_join['column_id'] . "
                                LIMIT 1
                            )" . PHP_EOL;
                    $this->sql['select'] .= " `" . $alias . "`.`" . $linked_join['column'] . "` AS `" . $column_array['column'] . "`," . PHP_EOL;
                }
                $return = TRUE;
            } else {
                $this->sql['join'] .= " " .
                    $linked_join['join'] . " " . $schema . "`" . $linked_join['table'] . "` `" . $alias . "`
                        ON `" . $alias . "`.`" . $linked_join['column'] . "` = `" . $this->model->tableName() . "`.`" . $linked_join['parent_column'] . "`" . PHP_EOL;
                $this->sql['select'] .= " `" . $alias . "`.`" . $linked_join['select'] . "` AS `" . $column_array['column'] . "`," . PHP_EOL;
                $return = TRUE;
            }
        }

        return $return;
    }


}