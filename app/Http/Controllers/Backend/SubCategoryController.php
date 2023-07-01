<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{ 
    //
    public function SubCategoryView(){

        $categories = Category::orderBy('category_name_fr','ASC')->get();
    	$subcategory = SubCategory::latest()->get();
    	return view('backend.category.subcategory_view',compact('subcategory','categories'));

    }

    public function SubCategoryStore(Request $request){

        $request->validate([
             'category_id' => 'required',
             'subcategory_name_en' => 'required',
             'subcategory_name_fr' => 'required',
         ],[
             'category_id.required' => 'Veuillez choisir une option',
             'subcategory_name_fr.required' => 'Entrée Sous-catégorie Nom français',
         ]);
 
 
 
        SubCategory::insert([
         'category_id' => $request->category_id,
         'subcategory_name_en' => $request->subcategory_name_en,
         'subcategory_name_fr' => $request->subcategory_name_fr,
         'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
         'subcategory_slug_fr' => str_replace(' ', '-',$request->subcategory_name_fr),
 
 
         ]);
 
         $notification = array(
             'message' => 'Insertion réussie de la sous-catégorie',
             'alert-type' => 'success'
         );
 
         return redirect()->back()->with($notification);
 
     } // end method 

     public function SubCategoryEdit($id){
    	$categories = Category::orderBy('category_name_fr','ASC')->get();
    	$subcategory = SubCategory::findOrFail($id);
    	return view('backend.category.subcategory_edit',compact('subcategory','categories'));

    }


    public function SubCategoryUpdate(Request $request){

    	$subcat_id = $request->id;

    	 SubCategory::findOrFail($subcat_id)->update([
		'category_id' => $request->category_id,
		'subcategory_name_en' => $request->subcategory_name_en,
		'subcategory_name_fr' => $request->subcategory_name_fr,
		'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
		'subcategory_slug_fr' => str_replace(' ', '-',$request->subcategory_name_fr),


    	]);

	    $notification = array(
			'message' => 'Sous-catégorie Mise à jour réussie',
			'alert-type' => 'info'
		);

		return redirect()->route('all.subcategory')->with($notification);

    }  // end method


    public function SubCategoryDelete($id){

    	SubCategory::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Sous-catégorie supprimée avec succès',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    }

     /////////////// That for SUB->SUBCATEGORY ////////////////

     public function SubSubCategoryView(){

        $categories = Category::orderBy('category_name_fr','ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view',compact('subsubcategory','categories'));
   
    }

    public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_fr','ASC')->get();
        return json_encode($subcat);
    }

    public function GetSubSubCategory($subcategory_id){

        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_fr','ASC')->get();
        return json_encode($subsubcat);
     }

    public function SubSubCategoryStore(Request $request){

        $request->validate([
             'category_id' => 'required',
             'subcategory_id' => 'required',
             'subsubcategory_name_en' => 'required',
             'subsubcategory_name_fr' => 'required',
         ],[
             'category_id.required' => 'Veuillez sélectionner une option',
             'subsubcategory_name_fr.required' => 'Entrée Sous-sous-catégorie Nom français',
             'subsubcategory_name_en.required' => 'Entrée Sous-sous-catégorie Nom anglais',
         ]);
 
 
 
        SubSubCategory::insert([
         'category_id' => $request->category_id,
         'subcategory_id' => $request->subcategory_id,
         'subsubcategory_name_en' => $request->subsubcategory_name_en,
         'subsubcategory_name_fr' => $request->subsubcategory_name_fr,
         'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_en)),
         'subsubcategory_slug_fr' => str_replace(' ', '-',$request->subsubcategory_name_fr),
 
 
         ]);
 
         $notification = array(
             'message' => 'Sous-sous-catégorie insérée avec succès',
             'alert-type' => 'success'
         );
 
         return redirect()->back()->with($notification);
 
     } // end method

     public function SubSubCategoryEdit($id){
    	$categories = Category::orderBy('category_name_fr','ASC')->get();
    	$subcategories = SubCategory::orderBy('subcategory_name_fr','ASC')->get();
    	$subsubcategories = SubSubCategory::findOrFail($id);
    	return view('backend.category.sub_subcategory_edit',compact('categories','subcategories','subsubcategories'));

    }

    public function SubSubCategoryUpdate(Request $request){

    	$subsubcat_id = $request->id;

    	SubSubCategory::findOrFail($subsubcat_id)->update([
		'category_id' => $request->category_id,
		'subcategory_id' => $request->subcategory_id,
		'subsubcategory_name_en' => $request->subsubcategory_name_en,
		'subsubcategory_name_fr' => $request->subsubcategory_name_fr,
		'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_en)),
		'subsubcategory_slug_fr' => str_replace(' ', '-',$request->subsubcategory_name_fr),


    	]);

	    $notification = array(
			'message' => 'Mise à jour de la sous-sous-catégorie réussie',
			'alert-type' => 'info'
		);

		return redirect()->route('all.subsubcategory')->with($notification);

    } // end method

    public function SubSubCategoryDelete($id){

    	SubSubCategory::findOrFail($id)->delete();
    	 $notification = array(
			'message' => 'Sous-sous-catégorie supprimée avec succès',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    }



}  
