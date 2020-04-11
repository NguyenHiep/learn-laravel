<?php

/**
 * Created by PhpStorm.
 * User: nguyenminhhiep
 * Date: 3/8/2018
 * Time: 9:51 AM
 */
namespace App\Helpers;
class ToolbarConfig
{
    public $limit = 12;
    public $sort  = [ 'column' => 'id', 'value'  => 'desc' ];
    public $mode  = 'gallery';
    public $search = '';
    /**
     * @var ToolbarConfig The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *ToolbarConfig* instance of this class.
     *
     * @return ToolbarConfig The *ToolbarConfig* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *ToolbarConfig* via the `new` operator from outside of this class.
     */
    protected function __construct()
    {
        // Set limit for pagination
        $list_number = [12, 24, 48];
        $set_limit   = request()->query('limit');
        if (in_array($set_limit, $list_number)) {
            $this->limit = $set_limit;
        }

        // Set parameter sort
        $list_sort = ['new_desc', 'name_asc', 'name_desc', 'price_asc', 'price_desc'];
        $set_sort  = request()->query('sort');
        if (in_array($set_sort, $list_sort)) {
            if ($set_sort === 'new_desc') {
                $set_sort = 'id_desc';
            }
            $set_sort = explode('_', $set_sort);
            $this->sort = [
                'column' => $set_sort[0],
                'value'  => $set_sort[1],
            ];
        }

        // Set mode view
        $list_mode = ['gallery', 'list', 'table'];
        $set_mode  = request()->query('mode');
        if (in_array($set_mode, $list_mode)) {
            $this->mode = request()->query('mode');
        }
        
        //  Set parameter search
        $set_search = request()->query('q');
        if (!empty($set_search)) {
            $this->search = $set_search;
        }
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *ToolbarConfig* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *ToolbarConfig*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }

}