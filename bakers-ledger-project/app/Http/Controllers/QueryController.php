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
        $result = DB::select("SELECT s.title\"магазин\", t.title\"торговая марка\", t.price\"цена\", g.quantity\"количество\", d.date\"дата\"FROM goods g INNER JOIN deliveries d ON g.delivery_id = d.id INNER JOIN shops s ON d.shop_id = s.id INNER JOIN trademarks t ON g.trademark_id = t.id ORDER BY d.date DESC");

        return view('queries/show', [
            'query' => 'Поставки, магазины и торговые марки отсортированные с последней даты поставки',
            'result' => $result
        ]);
    }

    public function inner_join_4()
    {
        $result = DB::select("SELECT s.title\"магазин\", t.title\"торговая марка\", t.price\"цена\", g.quantity\"количество\", d.date\"дата\"FROM goods g INNER JOIN deliveries d ON g.delivery_id = d.id INNER JOIN shops s ON d.shop_id = s.id INNER JOIN trademarks t ON g.trademark_id = t.id WHERE d.date >='2020-01-01'AND d.date <= CURRENT_DATE ORDER BY d.date DESC");

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
        $result = DB::select("SELECT s.title\"магазин\", t.title\"торговая марка\", t.price\"цена\", g.quantity\"количество\", d.date\"дата\"FROM goods g INNER JOIN deliveries d ON g.delivery_id = d.id INNER JOIN shops s ON d.shop_id = s.id INNER JOIN trademarks t ON g.trademark_id = t.id");

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
        $result = DB::select("SELECT c.title\"предприятие\", o.lastname\"фамилия\", o.firstname\"имя\", o.patronym\"отчество\"FROM companies c RIGHT JOIN company_owner co ON co.company_id = c.id RIGHT JOIN owners o ON co.owner_id = o.id ORDER BY c.title, o.lastname, o.firstname, o.patronym");

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

    public function aggregate_no_condition()
    {
        $result = DB::select("SELECT AVG(quantity)\"количество\"FROM goods");

        return view('queries/show', [
            'query' => 'Среднее количество товаров в поставке',
            'result' => $result
        ]);
    }

    public function aggregate_condition_data()
    {
        $result = DB::select("SELECT t.title\"торговая марка\", t.weight\"вес\", MIN(quantity)\"мин кол-во\", MAX(quantity)\"макс кол-во\"FROM goods g JOIN trademarks t ON g.trademark_id = t.id WHERE t.weight < 400 GROUP BY t.title, t.weight ORDER BY t.title");

        return view('queries/show', [
            'query' => 'Максимальное и минимальное количество поставленных товаров торговой марки, если её вес равен меньше 400 грамм',
            'result' => $result
        ]);
    }

    public function aggregate_condition_group()
    {
        $result = DB::select("SELECT c.title\"предприятие\", t.title\"торговая марка\", MIN(quantity)\"мин кол-во\", MAX(quantity)\"макс кол-во\"FROM goods g JOIN trademarks t ON g.trademark_id = t.id JOIN companies c ON t.company_id = c.id WHERE c.title LIKE'%eos%'GROUP BY c.title, t.title ORDER BY c.title, t.title");

        return view('queries/show', [
            'query' => 'Максимальное и минимальное количество поставленных товаров торговой марки, если название предприятия торговой марки содержит слово \'eos\'',
            'result' => $result
        ]);
    }

    public function aggregate_condition_both()
    {
        $result = DB::select("SELECT c.title\"предприятие\", t.title\"торговая марка\", t.weight\"вес\", MIN(quantity)\"мин кол-во\", MAX(quantity)\"макс кол-во\"FROM goods g JOIN trademarks t ON g.trademark_id = t.id JOIN companies c ON t.company_id = c.id WHERE c.title LIKE'%eos%'AND t.weight < 400 GROUP BY c.title, t.title, t.weight ORDER BY c.title, t.title");

        return view('queries/show', [
            'query' => 'Объединение второго и третьего запроса',
            'result' => $result
        ]);
    }

    public function aggregate_mishmash()
    {
        $result = DB::select("SELECT title\"торговая марка\", max\"макс кол-во\"FROM ( SELECT t.title title, MAX(quantity) max FROM goods g JOIN trademarks t ON g.trademark_id = t.id GROUP BY t.title ORDER BY t.title ) AS sub WHERE max > 50");

        return view('queries/show', [
            'query' => 'Максимальное количество поставленных товаров торговой марки, которое больше 50 штук',
            'result' => $result
        ]);
    }

    public function aggregate_subquery()
    {
        $result = DB::select("SELECT company\"предприятие\", trademark\"торговая марка\", min, max FROM ( SELECT c.title company, t.title trademark, MIN(t.price) min, MAX(t.price) max FROM goods g JOIN deliveries d ON g.delivery_id = d.id JOIN trademarks t ON g.trademark_id = t.id JOIN companies c ON t.company_id = c.id GROUP BY c.title, t.title ORDER BY c.title, t.title ) sub WHERE min = max");

        return view('queries/show', [
            'query' => 'Торговые марки, цена за которые не изменялась за все поставки',
            'result' => $result
        ]);
    }
}
