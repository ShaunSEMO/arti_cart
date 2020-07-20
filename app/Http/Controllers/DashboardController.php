<?php

namespace App\Http\Controllers;

use App\Item;
use App\Item_image;
use App\Category;
use DB;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
-----------------------
| Universal Dasboard |
-----------------------
| Development Credenetials
| username: tshego@swaydev.co.za
| pass: m3zum()_13()y
-----------------------
*/


class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*--------
    Shop CRUD 
    --------*/
    public function shop() {
        $categories = Category::get();

        return view('dashboard.shop', compact(['categories']));
    }

    public function addCategory() {
        return view('dashboard.shop.addCategory');
    }

    public function saveCategory(Request $request) {
        $category = new Category;
        $category->icon = $request->input('icon');
        $category->title = $request->input('title');
        $category->save();

        return redirect('/$d_3c0mm3rc3/shop');

    }

    public function addItem() {
        $categories = Category::get();

        return view('dashboard.shop.addItem', compact(['categories']));
    }

    public function saveItem(Request $request) {

        $item_category = $request->input('category');
        $item_name = $request->input('name');
        $item_price = $request->input('price');
        $item_desc = $request->input('desc');
        $item_color = $request->input('color');
        $item_tag = $request->input('tag');

        return view('dashboard.shop.addItemImgs', compact(['item_category', 'item_name', 'item_price', 'item_desc', 'item_color', 'item_tag']));
    }

    public function saveItemImages(Request $request) {
        $item = new Item;
        $input_category = $request->input('item_category');
        $category = DB::table('categories')->where('title', $input_category)->get()->first();
        $item->category_id = $category->id;
        $item->name = $request->input('item_name');
        $item->price = $request->input('item_price');
        $item->desc = $request->input('item_desc');
        $item->color = $request->input('item_color');
        $item->tag = $request->input('item_tag');
        $item->save();

        $images = $request->file('image');
        if (count($images)>0) {

            foreach($images as $image):

                $item_image = new Item_image;
                $filenameWithExt = $image->getClientOriginalName();
                $path = $image->storeAs('public/shop/'.$item->name, $filenameWithExt);
                $item_image->image = 'storage/shop/'.$item->name.'/'.$image->getClientOriginalName();
                $item_image->item_id = $item->id;
                $item_image->save();

            endforeach;
        }
         else {
            return redirect('/$d_3c0mm3rc3/shop');
        }

        return redirect('/$d_3c0mm3rc3/shop');
    }

    public function editItem($id) {
        $item = Item::find($id);
        $categories = Category::get();
        return view('dashboard.shop.editItem', compact(['categories', 'item']));
    }

    public function updateItem(Request $request, $id) {
        $item = Item::find($id);
        $item_input_name = $request->input('name');
        $item_input_price = $request->input('price');
        $item_input_desc = $request->input('desc');
        $item_input_color = $request->input('color');
        $item_input_tag = $request->input('tag');
        $item_input_category = $request->input('category');
        $item_input_id = $item->id;
        $images = $item->images;

        return view('dashboard.shop.editItemImages', compact(['item_input_name', 'item_input_price', 'item_input_desc', 'item_input_color', 'item_input_tag', 'item_input_category', 'item_input_id', 'images']));
    }

    public function deleteItemImage(Request $request, $id) {
        $image = Item_image::find($id);
        $image->delete();

        $item_input_name = $request->input('item_name');
        $item_input_price = $request->input('item_price');
        $item_input_desc = $request->input('item_desc');
        $item_input_color = $request->input('item_color');
        $item_input_tag = $request->input('item_tag');
        $item_input_category = $request->input('item_category');
        $item_input_id = $request->input('item_id');

        $item = Item::find($item_input_id);
        $images = $item->images;

        return view('dashboard.shop.editItemImages', compact(['item_input_name', 'item_input_price', 'item_input_desc', 'item_input_color', 'item_input_tag', 'item_input_category', 'item_input_id', 'images']));
    }

    public function saveItemEditImages(Request $request, $id) {
        $item_input_name = $request->input('item_name');
        $item_input_price = $request->input('item_price');
        $item_input_desc = $request->input('item_desc');
        $item_input_color = $request->input('item_color');
        $item_input_tag = $request->input('item_tag');
        $item_input_category = $request->input('item_category');
        $item_input_id = $request->input('item_id');

        $item = Item::find($item_input_id);
        $images = $item->images;

        $imagess = $request->file('image');
        if (count($imagess)>0) {

            foreach($imagess as $image):

                $item_image = new Item_image;
                $filenameWithExt = $image->getClientOriginalName();
                $path = $image->storeAs('public/shop/'.$item->name, $filenameWithExt);
                $item_image->image = 'storage/shop/'.$item->name.'/'.$image->getClientOriginalName();
                $item_image->item_id = $item->id;
                $item_image->save();

            endforeach;
        }

        $item = Item::find($item_input_id);
        $images = $item->images;

        return view('dashboard.shop.editItemImages', compact(['item_input_name', 'item_input_price', 'item_input_desc', 'item_input_color', 'item_input_tag', 'item_input_category', 'item_input_id', 'images']));
    }

    public function updateItemAll(Request $request, $id) {
        $item = Item::find($request->input('item_id'));
        $input_category = $request->input('item_category');
        $category = DB::table('categories')->where('title', $input_category)->get()->first();
        $item->category_id = $category->id;
        $item->name = $request->input('item_name');
        $item->price = $request->input('item_price');
        $item->desc = $request->input('item_desc');
        $item->color = $request->input('item_color');
        $item->tag = $request->input('item_tag');
        $item->save();

        return redirect('/$d_3c0mm3rc3/shop');
    }
    
    public function deleteItem ($id) {
        $item = Item::find($id);
        $item->delete();
        $item_images = DB::table('item_images')->where('item_id', $id);
        $item_images->delete();
        return redirect('/$d_3c0mm3rc3/shop');
    }
}