<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function CategoryView(){
        $category = Category::latest()->get();
        return view('backend.category.category_view',compact('category'));
    }

    public function CategoryStore(Request $request){
        
        $request->validate([
            'category_name_en' => 'required',
            'category_name_fr' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_en.required' => 'Entrée le Nom de la marque en anglais',
            'category_name_fr.required' => 'Entrée le Nom de la marque en français',
            'category_icon.required' => 'Entrée l\'icone de la categorie ',
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_fr' => $request->category_name_fr,
            'category_slug_en' => strtolower(str_replace('', '-', $request->category_name_en)),
            'category_slug_fr' => str_replace('', '-',$request->category_name_fr),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Categorie insérée avec succès',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function CategoryUpdate(Request $request){

        $cat_id = $request->id;

        Category::findOrFail($cat_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_fr' => $request->category_name_fr,
            'category_slug_en' => strtolower(str_replace('', '-', $request->category_name_en)),
            'category_slug_fr' => str_replace('', '-',$request->category_name_fr),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Categorie modifier avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);

    }

    public function CategoryDelete($id){

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Categorie supprimé avec succès',
            'alert-type' => 'info'
        );

            return redirect()->back()->with($notification);  
    }



}
