<?php


namespace app\controllers;

use Illuminate\Database\Capsule\Manager as Capsule;

class dbcontroller
{
    public static function connection()
    {

        $capsule = new Capsule;
        global $wpdb;
        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => DB_NAME,
            'username' => DB_USER,
            'password' => DB_PASSWORD,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => $wpdb->prefix,
        ]);
        $capsule->setEventDispatcher(new \Illuminate\Events\Dispatcher(new \Illuminate\Container\Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        return $capsule;

    }

    public static function get_all_data($table_name)
    {
        self::connection();
      return  Capsule::table($table_name)->get();
    }

    public static function get_all_data_join($table_name_first,$table_name_second,$key_first,$key_second,array $titles1,array $titles2,$sort='id')
    {
        $title_value1 = '';
        foreach ($titles1 as $title1) {
            $title_value1 .= $table_name_first . '.' . $title1 . ',';
        }
        $title_value1 = substr_replace($title_value1, "", -1);

        $title_value2 = '';
        foreach ($titles2 as $title2) {
            $title_value2 .= $table_name_second . '.' . $title2 . ',';
        }
        $title_value2 = substr_replace($title_value2, "", -1);

        self::connection();

        return Capsule::table($table_name_first)
            ->join($table_name_second, $key_first, '=', $key_second)
            ->select($title_value1, $title_value2)
            ->orderByDesc($sort)
            ->get();

    }
    public static function get_all_data_join2($table_name_first,$table_name_second,$table_name_three,$key_first,$key_second,$key_three,array $titles1,array $titles2,array $titles3,$sort='id')
    {
        $title_value1 = '';
        foreach ($titles1 as $title1) {
            $title_value1 .= $table_name_first . '.' . $title1 . ',';
        }
        $title_value1 = substr_replace($title_value1, "", -1);

        
        $title_value2 = '';
        foreach ($titles2 as $title2) {
            $title_value2 .= $table_name_second . '.' . $title2 . ',';
        }
        $title_value2 = substr_replace($title_value2, "", -1);


        $title_value3 = '';
        foreach ($titles3 as $title3) {
            $title_value3 .= $table_name_three . '.' . $title3 . ',';
        }
        $title_value3 = substr_replace($title_value3, "", -1);


        self::connection();

        return Capsule::table($table_name_first)
            ->join($table_name_second, $key_first, '=', $key_second)
            ->join($table_name_three,$key_first ,'=',$key_three)
            ->select($title_value1, $title_value2,$title_value3)
            ->orderByDesc($sort)
            ->get();

    }

    public static function add_item($table_name, array $data)
    {
        self::connection();
        Capsule::table($table_name)->insert($data);
    }

    public static function delete_item($table_name, $id)
    {
        self::connection();
        Capsule::table($table_name)->delete($id);
    }

    public static function get_all_data_join_with_where($table_name_first,$table_name_second,$key_first,$key_second,array $titles1,array $titles2,$field_filter,$value_filter,$sort='id')
    {
        $title_value1 = '';
        foreach ($titles1 as $title1) {
            $title_value1 .= $table_name_first . '.' . $title1 . ',';
        }
        $title_value1 = substr_replace($title_value1, "", -1);

        $title_value2 = '';
        foreach ($titles2 as $title2) {
            $title_value2 .= $table_name_second . '.' . $title2 . ',';
        }
        $title_value2 = substr_replace($title_value2, "", -1);

        Capsule::connection();
        if ($value_filter!='*')
        {
            return Capsule::table($table_name_first)
                ->join($table_name_second, $key_first, '=', $key_second)
                ->select($title_value1, $title_value2)
                ->where($field_filter,'=',$value_filter)
                ->orderByDesc($sort)
                ->get();
        }
        else
        {
            return Capsule::table($table_name_first)
                ->join($table_name_second, $key_first, '=', $key_second)
                ->select($title_value1, $title_value2)
                ->orderByDesc($sort)
                ->get();
        }

    }
    public static function get_all_data_join_with_where2($table_name_first,$table_name_second,$table_name_three,$key_first,$key_second,$key_three,array $titles1,array $titles2,array $titles3,$field_filter,$value_filter,$sort='id')
    {
        $title_value1 = '';
        foreach ($titles1 as $title1) {
            $title_value1 .= $table_name_first . '.' . $title1 . ',';
        }
        $title_value1 = substr_replace($title_value1, "", -1);

        $title_value2 = '';
        foreach ($titles2 as $title2) {
            $title_value2 .= $table_name_second . '.' . $title2 . ',';
        }
        $title_value2 = substr_replace($title_value2, "", -1);

        $title_value3 = '';
        foreach ($titles3 as $title3) {
            $title_value3 .= $table_name_three . '.' . $title3 . ',';
        }
        $title_value3 = substr_replace($title_value3, "", -1);

        Capsule::connection();
        if ($value_filter!='*')
        {
            return Capsule::table($table_name_first)
                ->join($table_name_second, $key_first, '=', $key_second)
                ->join($table_name_three, $key_first, '=', $key_three)
                ->select($title_value1, $title_value2,$title_value3)
                ->where($field_filter,'=',$value_filter)
                ->orderByDesc($sort)
                ->get();
        }
        else
        {
            return Capsule::table($table_name_first)
                ->join($table_name_second, $key_first, '=', $key_second)
                ->join($table_name_three, $key_first, '=', $key_three)
                ->select($title_value1, $title_value2)
                ->orderByDesc($sort)
                ->get();
        }

    }

    public static function update($table_name,array $data, $fieldname, $key)
    {
        self::connection();
        Capsule::table($table_name)
            ->where($fieldname,'=',$key)
            ->update($data);
    }


}