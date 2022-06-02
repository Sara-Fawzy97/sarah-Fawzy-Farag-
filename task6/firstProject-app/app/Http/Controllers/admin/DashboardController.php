<?php
namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {

    public function index(){
        return view('admins.dashboard');
    }


}
