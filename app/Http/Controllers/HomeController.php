<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use App\Models\Category;
use App\Models\Create;
use  Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){
        $user= User::all()->count();
        $book=Book::all()->count();
        $borrow=Borrow::where('status', 'approved')->count();
         $return=Borrow::where('status', 'returned')->count();
         $create = Create::all()->count();
        return view('admin.index', compact('user', 'book', 'borrow', 'return','create' ));
    }

    public function home(){
         $books = Book::all();  
        return view('home.index', compact('books'));
    }

  public function book_details($id){


    $data = Book::find($id);
    return view('home.book_details', compact('data'));
  }

 public function borrow_books($book_id)
{
    $data = Book::find($book_id);

    if (!$data) {
        return redirect()->back()->with('message', 'Book not found');
    }

    $quantity = $data->quantity;

    if ($quantity >= 1) {

        if (Auth::check()) {
            $borrow = new Borrow;

            $borrow->book_id = $book_id;
            $borrow->user_id = Auth::id();
            $borrow->status = 'Applied';

            $borrow->save();

            return redirect()->back()->with('message', 'Your borrow request has been sent to the admin');
        } else {
            return redirect('/login')->with('message', 'Please login to borrow a book');
        }

    } else {
        return redirect()->back()->with('message', 'Not enough book available');
    }
}

public function book_history(){


    if(Auth::id()){


        $userid= Auth::user()->id;

        $data= Borrow::where('user_id', '=' , $userid)->get();
    
    return view('home.book_history', compact('data'));
    }
   
}

public function cancel_book($id)
{
    $borrow = Borrow::where('id', $id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    $borrow->delete();

    return redirect()->back()
        ->with('message', 'Book Borrow Request Cancelled Successfully!');
}

public function explore(){
    $category= Category::all();
     $data=Book::all();
    return view('home.explore', compact('data', 'category'));
}

public function search(Request $request){
    $category= Category::all();
    $search= $request->search;
    $data= Book::where('title', 'LIKE', '%'.$search. '%')
    ->orWhere('auther_name', 'LIKE', '%'.$search. '%');
    return view('home.explore', compact('data', 'category'));
}
 

public function cat_search($id){


    $category= Category::all();
    $data= Book::where('category_id', $id)->get();
    return view('home.explore', compact('data','category'));
}

 public function create()
    {
        return view('home.create'); 
    }

public function store_create(Request $request){

   
    $data= new Create();

$data->title= $request->title;
$data->phone= $request->phone;
$data->email= $request->email;
$data->description= $request->description;
$data->address= $request->address;

$user_image= $request->user_img;

if ($request->hasFile('user_img')) {

    $user_image = $request->file('user_img');

    $user_image_name = time().'.'.$user_image->getClientOriginalExtension();

    $user_image->move(public_path('user_images'), $user_image_name);

    $data->user_img = $user_image_name;
}
$data->save();
return redirect()->back()->with('message', 'User Added Successfully!');
}
}
