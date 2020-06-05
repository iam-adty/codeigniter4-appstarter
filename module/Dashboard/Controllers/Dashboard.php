<?php namespace Dashboard\Controllers;

use AdminLTE\View\Component\Card;
use Config\Services;
use Xpander\Controller;

/**
 * @property Dashboard\View $view
 */
class Dashboard extends Controller
{
    protected function _init()
    {
        $this->view->data->user->name = Services::session()->get('user');
    }

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

        return $this->_render(function () {
            return $this->view->render();
        });
    }
}
