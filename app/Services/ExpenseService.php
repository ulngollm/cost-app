<?php

namespace App\Services;

use App\Models\Expense;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;

class ExpenseService
{
    public static function getExpensesByWeek($page)
    {
        //работа с датами https://www.digitalocean.com/community/tutorials/easier-datetime-in-laravel-and-php-with-carbon

        $nearestDate = now()->subWeek($page - 1)->toDateString();

        $lastDate = now()->subWeek($page)->toDateString();
        $query = Expense::where('date', '>', $lastDate)->where('date', '<=', $nearestDate)->orderBy('date', 'desc');
        $query->addSelect([
            'category' => Category::select('name')
                ->whereColumn('categories.id', 'category')
        ]);
        // Log::info(serialize($query));
        $expenses = $query->get();

        $expenses = self::groupByDays($expenses);
        self::calculateDailySum($expenses);
        $result = self::paginateWeekResult($expenses, $page);
        return $result;
    }

    public static function groupByDays($result)
    {
        $result = $result->groupBy('date');
        return $result;
    }

    public static function paginateWeekResult($expenses, $page)
    {

        $result =  new Paginator($expenses, null, $page); //второй параметр установить в null, чтобы дополнительно не обрезал переданный массив
        return $result;
    }


    public static function calculateDailySum(&$items)
    {
        foreach($items as &$expenses){
            $expenses['amount'] = $expenses->sum('sum');
        }
    }
}
