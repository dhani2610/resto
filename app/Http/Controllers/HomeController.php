<?php

namespace App\Http\Controllers;

use App\Models\CatatanKeuangan;
use App\Models\Category;
use App\Models\Galery;
use App\Models\Menu;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(Request $request){
        $data['page_title'] = 'Dashboard';

		return view('dashboard',$data);
    }
    public function index(Request $request){
        $data['page_title'] = 'Home';
        $data['testimoni'] = Testimoni::get();
        $data['galery'] = Galery::get();
        $data['category'] = Category::get();
        $data['menu'] = Menu::get();

		return view('landing/index',$data);
    }
}
