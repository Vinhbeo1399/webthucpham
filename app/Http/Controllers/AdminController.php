<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Statistic;
use Carbon\Carbon;
use App\Product;
use App\Article;
use App\Order;

class AdminController extends Controller
{
    public function login(){
        return view('backend.admin.index');
    }

    public function postLogin(Request $request)
    {

        //validate dữ liệu
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]); // validate false => tạo ra biến $errors để lưu toàn thông tin bị lỗi cho từng trường

        // validate thành công

        $dataLogin = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
//        dd($dataLogin);
        $checkLogin = Auth::attempt($dataLogin, $request->has('remember'));

        // kiểm tra xem có đăng nhập thành công với email và password đã nhập hay không
        if ($checkLogin) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('msg', ' Kiểm tra lại email hoặc mật khẩu mà bạn nhập');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    
    public function dashboard(){
        $product = Product::all()->count();
        $article = Article::all()->count();
        $order = Order::all()->count();
        $article_view = Article::orderBy('views','DESC')->take(20)->get();
        $product_view = Product::orderBy('views','DESC')->take(20)->get();
        return view('backend.admin.dashboard')->with(compact('product', 'article', 'order','article_view','product_view'));
    }

    public function filter_by_date(Request $request){
        $data = $request->all();
        
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Statistic::whereBetween('order_date', [$from_date, $to_date])->orderBy('order_date', 'ASC')->get();

        $chart_data = array();
        foreach ($get as $key => $value) {
            $chart_data[] = [
                'period' => $value->order_date,
                'order' => $value->total_order,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity,
            ];
        }

        echo $data = json_encode($chart_data);
    }

    public function dashboard_filter(Request $request){
        $data = $request->all();

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value'] == '7ngay'){
            $get = Statistic::whereBetween('order_date', [$sub7days, $now])->orderBy('order_date', 'ASC')->get();
        }elseif ($data['dashboard_value'] == 'thangtruoc') {
            $get = Statistic::whereBetween('order_date', [$dau_thangtruoc, $cuoi_thangtruoc])->orderBy('order_date', 'ASC')->get();
        }elseif ($data['dashboard_value'] == 'thangnay') {
            $get = Statistic::whereBetween('order_date', [$dauthangnay, $now])->orderBy('order_date', 'ASC')->get();
        }else{
            $get = Statistic::whereBetween('order_date', [$sub365days, $now])->orderBy('order_date', 'ASC')->get();
        }

        $chart_data = array();
        foreach ($get as $key => $value) {
            $chart_data[] = [
                'period' => $value->order_date,
                'order' => $value->total_order,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity,
            ];
        }

        echo $data = json_encode($chart_data);
    }

    public function days_order()
    {
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Statistic::whereBetween('order_date', [$sub365days, $now])->orderBy('order_date', 'ASC')->get();

        $chart_data = array();
        foreach ($get as $key => $value) {
            $chart_data[] = [
                'period' => $value->order_date,
                'order' => $value->total_order,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity,
            ];
        }

        echo $data = json_encode($chart_data);
    }
}
