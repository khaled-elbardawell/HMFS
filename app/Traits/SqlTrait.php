<?php


namespace App\Traits;


use Illuminate\Support\Facades\DB;

trait SqlTrait
{

    /**
     * @param $statement
     * @param array $bindings
     * @return array
     */
    public static function sqlGet($statement,$bindings = [])
    {
        return DB::select($statement,$bindings);
    }// end method


    /**
     * @param $statement
     * @param array $bindings
     * @return mixed|null
     */
    public static function sqlFirst($statement,$bindings = [])
    {
        return DB::select($statement,$bindings)[0]??null;
    }// end method


    /**
     * @param $statement
     * @param array $bindings
     * @param $countPagesql
     * @param $counterColName
     * @param array $countPageSqlbindings
     * @param null $paginateNum
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public static function sqlPage($statement,$bindings = [],$countPagesql,$counterColName,$countPageSqlbindings = [],$paginateNum = null)
    {
        $limit = is_null($paginateNum) ? PAGINATE_VALUE : $paginateNum;
        $page = self::getPageNum();
        $offset = ($page - 1 ) * $limit;
        $statement .= " LIMIT $limit OFFSET $offset";
        $items = DB::select($statement,$bindings);
        $counterPage = DB::select($countPagesql,$countPageSqlbindings);
        $counterPage = isset($counterPage[0]) ? $counterPage[0]->$counterColName : 1;
        return self::getPaginator($items,$counterPage,$limit,$page);
    }// end method


    /**
     * Get page no from request (param)
     * @return int|mixed
     */
    private static function getPageNum(){
        $page = 1;
        if (\request()->has('page')){
            if (\request()->page){
                if (preg_match("/^\d+$/", \request()->page)){
                    $page = \request()->page;
                }else{
                    \request()->replace(['page' => 1]);
                    $page = 1;
                }
            }
        }
        return $page;
    }


    /**
     * Get Paginator For Sql Query
     * @param $items
     * @param $limit
     * @param $page
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    private static function getPaginator($items,$counterPage,$limit,$page){
        $perPage = request()->input("per_page", 10);
        $skip = $page * $perPage;
        if($limit < 1) { $limit = 1; }
        if($skip < 0) { $skip = 0; }
        return new \Illuminate\Pagination\LengthAwarePaginator($items, $counterPage, $limit, $page,['path' => request()->url(), 'query' => request()->query()]);
    }// end method

}// end trait
