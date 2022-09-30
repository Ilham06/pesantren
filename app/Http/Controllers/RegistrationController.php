<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->module = 'registration';
        View::share(['module' => $this->module]);
    }

    public function index()
    {  
        if (request()->ajax()) {
            $query = Registration::all();
            return DataTables::of($query)
                ->editColumn('phone', function($data) {
                    return '<a href="https://wa.me/'. $data->phone .'?text=Hallo" class="alert-link">'. $data->phone .'</a>';
                })
                ->rawColumns(['phone'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('pages.admin.' . $this->module . '.index');
    }
}
