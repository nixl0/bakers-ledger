<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function index()
    {
        return view('queries/index');
    }

    public function inner_join_1()
    {
        $result = DB::select("SELECT districts.title AS\"название\", settlements.title AS\"город\"FROM districts INNER JOIN settlements ON districts.settlement_id = settlements.id where settlements.title LIKE'%New%'");

        // dd($result);
        return view('queries/show', [
            'query' => 'Районы и их города, название которых содержит слово \'New\'',
            'result' => $result
        ]);
    }

    public function inner_join_2()
    {
        $result = DB::select("SELECT trademarks.title AS\"название\", companies.title AS\"предприятие\", grades.title AS\"сорт муки\"FROM trademarks INNER JOIN companies ON trademarks.company_id = companies.id INNER JOIN grades ON trademarks.grade_id = grades.id WHERE companies.title LIKE'%Et%'");

        return view('queries/show', [
            'query' => 'Торговые марки, сорта муки и предприятия, название которых содержит слово \'Et\'',
            'result' => $result
        ]);
    }

    public function inner_join_3()
    {
        $result = DB::select("SELECT shops.title AS\"магазин\", trademarks.title AS\"торговая марка\", deliveries.price AS\"цена\", deliveries.quantity AS\"количество\", deliveries.date AS\"дата\"FROM deliveries INNER JOIN shops ON deliveries.shop_id = shops.id INNER JOIN trademarks ON deliveries.trademark_id = trademarks.id ORDER BY deliveries.date DESC");

        return view('queries/show', [
            'query' => 'Поставки, магазины и торговые марки отсортированные с последней даты поставки',
            'result' => $result
        ]);
    }

    public function inner_join_4()
    {
        $result = DB::select("SELECT shops.title AS\"магазин\", trademarks.title AS\"торговая марка\", deliveries.price AS\"цена\", deliveries.quantity AS\"количество\", deliveries.date AS\"дата\"FROM deliveries INNER JOIN shops ON deliveries.shop_id = shops.id INNER JOIN trademarks ON deliveries.trademark_id = trademarks.id WHERE deliveries.date >='2020-01-01'AND deliveries.date <= CURRENT_DATE ORDER BY deliveries.date DESC");

        return view('queries/show', [
            'query' => 'Поставки, магазины и торговые марки, произведённые с 2020 года по нынешний день, отсортированные с последней даты',
            'result' => $result
        ]);
    }

    public function inner_join_5()
    {
        $result = DB::select("SELECT c.number AS\"номер\", l.title AS\"тип собственности\", c.title AS\"название\", d.title AS\"район\", s.title AS\"город\"FROM companies AS c INNER JOIN districts AS d ON c.district_id = d.id INNER JOIN settlements AS s ON d.settlement_id = s.id INNER JOIN legals AS l ON c.legal_id = l.id");

        return view('queries/show', [
            'query' => 'Предприятия, типы собственности, районы и города',
            'result' => $result
        ]);
    }

    public function inner_join_6()
    {
        $result = DB::select("SELECT s.number AS\"номер\", s.title AS\"название\", d.title AS\"район\", address AS\"адрес\", phone AS\"телефон\"FROM shops AS s INNER JOIN districts AS d ON s.district_id = d.id");

        return view('queries/show', [
            'query' => 'Магазины, районы и города',
            'result' => $result
        ]);
    }

    public function inner_join_7()
    {
        $result = DB::select("SELECT shops.title AS\"магазин\", trademarks.title AS\"торговая марка\", deliveries.price AS\"цена\", deliveries.quantity AS\"количество\", deliveries.date AS\"дата\"FROM deliveries INNER JOIN shops ON deliveries.shop_id = shops.id INNER JOIN trademarks ON deliveries.trademark_id = trademarks.id");

        return view('queries/show', [
            'query' => 'Поставки, магазин и торговые марки',
            'result' => $result
        ]);
    }

    public function left_join()
    {
        $result = DB::select("SELECT s.title AS\"название\", d.title AS\"район\"FROM settlements AS S LEFT JOIN districts AS d on d.settlement_id = s.id ORDER BY s.title, d.title");

        return view('queries/show', [
            'query' => 'Выводит города, вне зависимости есть ли у них районы',
            'result' => $result
        ]);
    }

    public function right_join()
    {
        $result = DB::select("SELECT c.title AS\"предприятие\", o.lastname AS\"фамилия\", o.firstname AS\"имя\", o.patronym AS\"отчество\"FROM companies AS c RIGHT JOIN company_owner AS co ON co.company_id = c.id RIGHT JOIN owners AS o ON co.owner_id = o.id ORDER BY c.title, o.lastname, o.firstname, o.patronym");

        return view('queries/show', [
            'query' => 'Выводит предприятия с владельцами',
            'result' => $result
        ]);
    }

    public function select_in_select()
    {
        $result = DB::select("SELECT t.title AS\"название\", c.title AS\"предприятие\"FROM trademarks AS t LEFT JOIN companies AS c ON t.company_id = c.id WHERE company_id IN ( SELECT id FROM companies WHERE title LIKE'%Ipsam%')");

        return view('queries/show', [
            'query' => 'Выводит торговые марки, названия компаний которых содержат слово \'Ipsam\'',
            'result' => $result
        ]);
    }
}
