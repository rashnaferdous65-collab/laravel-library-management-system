<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use App\Models\Borrow;
use App\Models\Create;
use  Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function add_category(){

      $data= Category::all();
        return view('admin.add_category', compact('data'));
    }

  
   public function made_category(Request $request)
{
    $data = new Category;
    $data->cat_title = $request->category;
    $data->save();
   return redirect()->back()->with('message', 'Category Added Successfully!');
}

public function cat_delete($id){
    $data = Category::findOrFail($id); 
    $data->delete();
    return redirect()->back()->with('success', 'Category deleted successfully!');
    flash()->success('Your changes have been saved!');
    

}
public function edit_category($id){
    $data = Category::findOrFail($id); 
    return view('admin.edit_category', compact('data')); 
}

public function update_category(Request $request, $id)
{
    $request->validate([
        'cat_name' => 'required|string|max:255',
    ]);

    $data = Category::findOrFail($id);
    $data->cat_title = $request->cat_name;
    $data->save();

    return redirect('/add_category')
        ->with('message', 'Category updated successfully');
}

public function add_book(){
    $data= Category::all();
    return view('admin.add_book', compact('data'));
}

public function store_book(Request $request){

$data= new Book;

$data->title= $request->book_name;
$data->auther_name= $request->auther_name;
$data->price= $request->price;
$data->quantity= $request->quantity;
$data->description= $request->description;
$data->category_id= $request->category;

$book_image= $request->book_img;
$auther_image= $request->auther_img;
if ($request->hasFile('book_img')) {

    $book_image = $request->file('book_img');

    $book_image_name = time().'.'.$book_image->getClientOriginalExtension();

    $book_image->move(public_path('book'), $book_image_name);

    $data->book_img = $book_image_name;
}




if ($request->hasFile('auther_img')) {
    $auther_image = $request->file('auther_img');

    $auther_image_name = time() . '.' . $auther_image->getClientOriginalExtension();

    $auther_image->move(public_path('auther'), $auther_image_name);

    $data->auther_img = $auther_image_name;
}


$data->save();
return redirect()->back();
}

public function view_book(){
    $books = Book::with('category')->paginate(3);
    return view('admin.view_book', compact('books'));
}

public function book_delete($id){


    $data= Book::find($id);

    $data->delete();

    return redirect()->back()->with('message', 'Book Details Deleted successfully');
}

public function edit_book($id){

  $data= Book::find($id);
  $category= Category::all();
    return view ('admin.edit_book', compact('data', 'category'));
}

public function update_book(Request $request, $id)
{
   $request->validate([
    'category_id' => 'required|exists:categories,id',
]);

    $data = Book::findOrFail($id);
    $data->title = $request->title;
    $data->auther_name = $request->auther_name;
    $data->price = $request->price;
    $data->quantity= $request->quantity;
    $data->description = $request->description;
     $data->category_id = $request->category_id;

  

    if ($request->hasFile('book_img')) {

     
        if ($data->book_img && file_exists(public_path('book/'.$data->book_img))) {
            unlink(public_path('book/'.$data->book_img));
        }

        $book_image = $request->file('book_img');
        $book_image_name = 'book_' . time() . '.' . $book_image->getClientOriginalExtension();
        $book_image->move(public_path('book'), $book_image_name);

        $data->book_img = $book_image_name;
    }

   
    if ($request->hasFile('auther_img')) {

        if ($data->auther_img && file_exists(public_path('auther/'.$data->auther_img))) {
            unlink(public_path('auther/'.$data->auther_img));
        }

        $auther_image = $request->file('auther_img');
        $auther_image_name = 'author_' . time() . '.' . $auther_image->getClientOriginalExtension();
        $auther_image->move(public_path('auther'), $auther_image_name);

        $data->auther_img = $auther_image_name;
    }

   
    $data->save();

    return redirect('/view_book')
        ->with('message', 'Book Details updated successfully');
}

public function borrow_book() 
{
    
    $data = Borrow::paginate(5); 
    
    return view('admin.borrow_book', compact('data'));
}


public function approve_book($id){
    $data = Borrow::find($id);

    if($data->status == 'approved'){
        return redirect()->back();
    } else {
        $data->status = 'approved';
        $data->save();

        $book = Book::find($data->book_id);

       
        if($book->quantity > 0){
            $book->decrement('quantity');  
        }

        return redirect()->back();
    }
}

public function reject_book($id){
    $data = Borrow::find($id);

    if($data->status == 'rejected'){
        return redirect()->back();
    } else {
        $data->status = 'rejected';
        $data->save();

       
        return redirect()->back();
    }
}

public function return_book($id){
    $data = Borrow::find($id);

    if($data->status == 'returned'){
        return redirect()->back();
    } else {
        $data->status = 'returned';
        $data->save();

        $book = Book::find($data->book_id);
        $book->increment('quantity');  

        return redirect()->back();
    }
}
public function reader_list() {
    
    $create = Create::all(); 
    return view('admin.reader_list', compact('create'));
}

public function edit_reader($id){

  $data= Create::find($id);
  $create= Create::all();
    return view ('admin.edit_reader', compact('data', 'create'));
}

public function update_reader(Request $request, $id)
{
    $data = Create::findOrFail($id);
    $data->title = $request->title;
    $data->phone = $request->phone;
    $data->email = $request->email;
    $data->description = $request->description;
    $data->address = $request->address;

    if ($request->hasFile('user_img')) {
       
        if ($data->user_img && file_exists(public_path('user_images/'.$data->user_img))) {
            unlink(public_path('user_images/'.$data->user_img));
        }

        
        $image = $request->file('user_img');
       
        $image_name = 'user_images_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('user_images'), $image_name);

        $data->user_img = $image_name;
    }
    
    $data->save();

    return redirect('/reader_list')
        ->with('message', 'Reader Details updated successfully');
}

public function reader_delete($id){


    $data= Create::find($id);

    $data->delete();

    return redirect()->back()->with('message', 'Reader Details Deleted successfully');
}
}
