<?php namespace Dashboard\Controllers;

use AdminLTE\View\Component\Card;
use Xpander\Controller;

/**
 * @property Dashboard\View $view
 */
class Dashboard extends Controller
{
    public function index()
    {
        $card = Card::create();
        $card->data->title = 'CARD';

        // $table = Table::create();
        // $table->data->name = 'table';
        // $table->data->columns = [
        //     'Nomor', 'Nama'
        // ];

        // $card->data->content = $table->render();

        $this->view->data->template->content = $card->render();

        return $this->view->render();
    }
}
