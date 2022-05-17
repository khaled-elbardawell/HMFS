<?php


namespace App\Traits;


use Illuminate\Support\Facades\DB;

trait SqlTrait
{

    protected $statement  = null;
    protected $bindings = [];


    /**
     * @param $query
     * @param $statement
     * @param array $bindings
     * @return mixed
     */
    public function scopeSql($query,$statement,$bindings = [])
    {
        $this->statement = $statement;
        $this->bindings = $bindings;
        return  $query;
    }// end method


    /**
     * @param $query
     * @return array
     */
    public function scopeSqlGet($query)
    {
        return DB::select($this->statement,$this->bindings);
    }// end method


    /**
     * @param $query
     * @return array
     */
    public function scopeSqlFirst($query)
    {
        return $this->scopeSqlGet($query)[0]??null;
    }// end method


    /**
     * @param $query
     * @param null $paginateNum
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function scopePageSql($query,$countPagesql,$counterColName,$countPageSqlbindings = [],$paginateNum = null)
    {
        $limit = is_null($paginateNum) ? PAGINATE_VALUE : $paginateNum;
        $page = $this->getPageNum();
        $offset = ($page - 1 ) * $limit;
        $this->statement .= " LIMIT $limit OFFSET $offset";
        $items = DB::select($this->statement,$this->bindings);
        $counterPage = DB::select($countPagesql,$countPageSqlbindings);
        $counterPage = isset($counterPage[0]) ? $counterPage[0]->$counterColName : 1;
        return $this->getPaginator($items,$counterPage,$limit,$page);
    }// end method


    /**
     * Get page no from request (param)
     * @return int|mixed
     */
    private function getPageNum(){
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
    private function getPaginator($items,$counterPage,$limit,$page){
        $perPage = request()->input("per_page", 10);
        $skip = $page * $perPage;
        if($limit < 1) { $limit = 1; }
        if($skip < 0) { $skip = 0; }
        return new \Illuminate\Pagination\LengthAwarePaginator($items, $counterPage, $limit, $page,['path' => request()->url(), 'query' => request()->query()]);
    }// end method

}// end trait
