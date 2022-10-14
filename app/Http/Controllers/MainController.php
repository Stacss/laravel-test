<?php

namespace App\Http\Controllers;

use App\BrandModel;
use App\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class MainController extends Controller
{
    public function home(){

        return view('welcome');

    }

    public function brands(){

        $brands = new BrandModel();

        return view('brands',['brands' => $brands->all()]); // передаем данные согласно модели BrandModel в представление brands

    }

    public function all_tables(){

        return view('all_tables');

    }

    public function form_add_brand(){

        $brands = new BrandModel();

        $brands = $brands->all()->reverse(); //перевернули список для удобства

        return view('form_add_brand', ['brands' => $brands]);
    }

    public function add_brand(Request $request){

        $valid = $request->validate([ //валидация, название должно быть больше 1
            'brand'=>'required|min:1'
        ]);

        $brand = new BrandModel();

        $checking = DB::table('brand_models')->where('brand', $request->brand)->first(); //проверка на совпадение

        if ($checking == true) {

            return redirect()->route('form_add_brand')->with('success', 'такой бренд уже существует');

        }

        else {

            $brand->brand = $request->input('brand');

            $brand->save();

        }

        return redirect()->route('form_add_brand')->with('success', 'Запись успешно добавлена');

    }

    public function form_update_brand ($id){

        $objBrand = new BrandModel();

        return view('update_brand', ['data'=> $objBrand->find($id)]);

    }
    public function update_brand($id, Request $request){

        $valid = $request->validate([
            'brand'=>'required|min:1'
        ]);

            $brand = new BrandModel();

            $brand = $brand->find($id); //находим нужную строку

            $brand->brand = $request->input('brand');//обновляем

            $brand->save();

        return redirect()->route('update_brand', $id)->with('success', 'запись обновлена');

    }

    public function count_goods($id){

        $goods = DB::table('goods')
            ->where('brand_id', '=', $id)
            ->get();

        $countGoods = count($goods);

        return view('count_goods', ['countGoods'=>$countGoods, 'goods'=>$goods] );

    }
    public function remove_brand($id){

        $brand = new BrandModel();

        $brand = $brand->find($id)->delete();

        return redirect()->route('brands')->with('success', 'запись удалена');

    }

    //goods

    public function goods(){

        $goods = new Goods();

        $brand = new BrandModel();

        $brand = $brand->all();

        return view('goods',['name' => $goods->all(), 'brand'=> $brand]);

    }

    public function form_add_goods(){

        $goods = new Goods();

        $goods = $goods->all()->reverse();

        $brand = new BrandModel();

        $brand = $brand->all();

        return view('form_add_goods', ['name' => $goods, 'brand'=> $brand]);

    }

    public function add_goods(Request $request){


        $valid = $request->validate([
            'brand_id'=>'required',
            'goods'=>'required'
        ]);

        $goods = new Goods();

        $goods->name = $request->input('goods');

        $goods->brand_id = $request->input('brand_id');

        $goods->save();

        return redirect()->route('form_add_goods')->with('success', 'товар успешно добавлен');

    }

    public function form_update_goods ($id){

        $objGoods = new Goods();

        $brand = new BrandModel();

        $brandAll = $brand->all();

        $rowGoods = $objGoods->find($id);

        $brand_id = $rowGoods->brand_id;

        $brand = $brand->find($brand_id);

        $brand = $brand->brand;

        return view('update_goods', [
            'data'=> $objGoods->find($id),
            'brand_name'=> $brand,
            'brand'=>$brandAll,
            'brand_id'=>$brand_id]);

    }
    public function update_goods($id, Request $request){

        $valid = $request->validate([ //валидация, название должно быть больше 2, должен быть выбран бренд
            'brand_id'=>'required',
            'goods'=>'required'
        ]);

        $Goods = new Goods();

        $Goods = $Goods->find($id); //находим нужную строку

        $Goods->name = $request->input('goods');//устанавливаем значения

        $Goods->brand_id = $request->input('brand_id');//устанавливаем значения

        $Goods->save();

        return redirect()->route('update_goods', $id)->with('success', 'запись обновлена');

    }
    public function remove_goods($id){

        $Goods = new Goods();

        $Goods = $Goods->find($id)->delete();

        return redirect()->route('goods')->with('success', 'запись удалена');
    }
}
