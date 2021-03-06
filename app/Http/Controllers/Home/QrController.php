<?php

namespace App\Http\Controllers\Home;

use App\Application;
use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Table;
use Illuminate\Http\Request;

class QrController extends Controller
{
    public function print($view_id)
    {
        if (Store::all()->where('view_id', '=', $view_id)->count() == 0)
            abort('404');
        $account_info = Application::all()->first();

        $data = Store::all()->where('view_id', '=', $view_id)->first();
        return view('Home.print_qr', [
            'data' => $data,
            'account_info' => $account_info
        ]);
    }

    public function tblprint($view_id, Table $table)
    {

        if (Store::all()->where('view_id', '=', $view_id)->count() == 0)
            abort('404');
        $account_info = Application::all()->first();

        $data = Store::all()->where('view_id', '=', $view_id)->first();
        return view('Home.print_tblqr', [
            'data' => $data,
            'account_info' => $account_info,
            'table' => $table
        ]);
    }

    /**
     * added by monika
     * for create qr code for vehical
     */
    public function vehicleprint($view_id)
    {

        if (Store::all()->where('view_id', '=', $view_id)->count() == 0)
            abort('404');
        $account_info = Application::all()->first();

        $data = Store::all()->where('view_id', '=', $view_id)->first();
        return view('Home.print_vehicleqr', [
            'data' => $data,
            'account_info' => $account_info
        ]);
    }
}
