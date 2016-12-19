<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Student;
use App\Category;
use App\Tag;

class FrontController extends Controller
{
    public function index()
    {
    	$posts = Post::all();
    	$students = Student::all();
		$categories = Category::all();

        //return view('home', ['posts' => $posts, 'students'=> $students, 'categories' => $categories]);
        return view('front.home', compact('posts', 'students'));
    }


    public function show($id)
    {
        $post = Post::find($id);

        return view('front.post', ['post' => $post]);
    }

    public function student($id){
        $student = Student::find($id);

        return view('front.student.index', compact('student'));
    }

    public function category($id){
        $category = Category::find($id);
        $title = $category->title;
        $posts = $category->posts;

        return view('front.category', [
            'category'=> $category,
            'title' => $title, 
            'posts'=> $posts 
            ]);
    }

    public function tag($id){
        $tag = Tag::find($id);
        $name = $tag->name;
        $posts = $tag->posts;
        return view('front.tag', compact('name', 'posts'));
    }


    public function showPostByUser($id)
    {
        $user = User::find($id); // Un objet de type User
        $name = $user->name; // nom de l'utilisateur string
        $posts = $user->posts; // oneToMany
        return view('front.user.index', compact('posts', 'name'));
    }
}


