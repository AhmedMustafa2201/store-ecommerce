<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\UpdatemainCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Enumeration\categoryType;

class mainCategoriesController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id','desc')->paginate(PAGINATE_COUNT);
        return view('dashboard.maincategories.index',compact('categories'));
    }
    
    public function create(){
        $categories =   Category::get();
        return view('dashboard.maincategories.create',compact('categories'));
    }

    public function store(UpdatemainCategoryRequest $request){
        try{
            if(!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);
            
            if($request->type == categoryType::mainCategory){
                $request->request->add(['parent_id' => null]);
            }
            $categoryCreate = Category::create($request->except('_token'));
            $categoryCreate->name = $request->name;
            $categoryCreate->save();
            // dd($categoryCreate);
            return redirect()->route('mainCategories.index')->with(['success' => 'تمت اضافه القسم بنجاح']);
        }
        catch(\Exception $ex){

            return redirect()->back()->With(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }
    }
    public function edit($id){
        $category = Category::find($id);
        if(!$category){
            return redirect()->back()->with(['error' => 'هذا القسم غير موجود']);
        }
        return view("dashboard.maincategories.edit",compact('category'));
    }

    public function update($id,UpdatemainCategoryRequest $request){
        try{
            if(!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);
            $category = Category::find($id);
            if(!$category){
                return redirect()->back()->with(['error' => 'هذا القسم غير موجود']);
            }

            $category->update($request->except($request->type));
            $category->name = $request->name;
            $category->save();
            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }
    }

    public function destroy($id){
        try{
            $category = Category::find($id);
            if(!$category){
                return redirect()->back()->with(['error'=> 'هذا القسم غير موجود']);
            }

            $category->delete();
            return redirect()->route('mainCategories.index')->with(['success' => 'تم الحذف بنجاح']);
        }

        catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك مشكله ما يرجى المحاوله مره اخرى']);
        }

    }
}
