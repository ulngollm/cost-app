<?php

namespace App\Services;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Pagination\Paginator;


class ExpenseService
{
    public static function getExpensesByWeek($page)
    {
        //работа с датами https://www.digitalocean.com/community/tutorials/easier-datetime-in-laravel-and-php-with-carbon

        $startDate = now()->subWeek($page + 1)->toDateString();
        $endDate = now()->subWeek($page)->toDateString();
        $query = Expense::where('date', '>', $startDate)->where('date', '<', $endDate)->orderBy('date', 'desc');
        $query->addSelect([
            'category' => Category::select('name')
                ->whereColumn('categories.id', 'category')
        ]);
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
