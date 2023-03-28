<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class BalanceUpFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function user($id)
    {
        return $this->where('user_id', $id);
    }

    public function date($date)
    {
        return $this->where('date', $date);
    }

    public function money($money)
    {
        return $this->where('money', $money);
    }

}
