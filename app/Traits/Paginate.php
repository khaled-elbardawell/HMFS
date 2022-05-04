<?php


namespace App\Traits;


trait Paginate
{

    /**
     * Laravel Pagination Scope
     * @param $query
     * @return mixed
     */
    public function scopePage($query)
    {
        return $query->paginate(PAGINATE_VALUE);
    }// end method


    /**
     * Get Start Num Counter When Preview Table Rows
     * @return int
     */
    public static function getStartCounter(){
        $page = request()->page??1;
        return ($page * PAGINATE_VALUE) + 1 - PAGINATE_VALUE;
    }// end method

}// end class
