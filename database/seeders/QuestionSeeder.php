<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            ['question' => 'Где забирать заказ?', 'answer' => 'Забрать заказ можно по адресу салона. г. Челябинск, ул Руставели, д.2. Вход со стороны двора. Второй этаж, студия №207.', 'status_id' => 4, 'user_id' => 1],
            ['question' => 'Как оплатить заказ?', 'answer' => 'Заказ можно оплатить картой или наличными при получении заказа. Заранее оплатить заказ не возможно.', 'status_id' => 4, 'user_id' => 1],
            ['question' => 'Что делать, если я передумал или неверно собрал свой заказ?', 'answer' => 'Вы можете отменить заказ в своем личном кабинете и при необходимости оформить новый', 'status_id' => 4, 'user_id' => 1],
            ['question' => 'Какие сроки доставки?', 'answer' => 'Доставка товаров будет осуществлена на следующий же день в салон после 12:00, если заказ был оформлен до 19:00 по местному времени.', 'status_id' => 4, 'user_id' => 1],
            ['question' => 'Каковы сроки хранения заказа?', 'answer' => 'Заказ хранится в салоне 3 дня со дня прибытия. После он расформировывается и отменяется.', 'status_id' => 4, 'user_id' => 1],
            ['question' => 'Могу ли я вернуть заказ?', 'answer' => 'Да, вы можете вернуть заказ или товар из заказа после получения.', 'status_id' => 4, 'user_id' => 1],
            ['question' => 'Какой-то вопрос', 'answer' => '', 'status_id' => 1, 'user_id' => 1],
            ['question' => 'Какой-то вопрос', 'answer' => '', 'status_id' => 1, 'user_id' => 1]
        ]);
    }
}
