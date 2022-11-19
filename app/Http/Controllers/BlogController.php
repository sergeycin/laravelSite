<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Blog;
use App\Models\User;

class BlogController extends Controller
{
    public function index($page = 1)
    {

        $blogs = Blog::skip($page*3 - 3)->limit(3)->get();
        $massik = array();
        $countPages =floor( Blog::count() / 3 );
        for($i=0; $i<count($blogs); $i++)
        {
            $massik[] = $blogs[$i]->id_author;
        }
        $authors = \App\Models\User::whereIn('id', $massik)->get();
        return view('myblog',['blogs' => $blogs, 'authors' => $authors, 'countPages'=>$countPages]);
    }

    public function store()
    {
        request()->validate
        (
            [
                'theme'=>['required','max:20'],
                'text' => ['required', 'max: 180'],
                'name' => ['required', 'max:30']
            ]
        );
        $blogik = new Blog();
        $blogik->theme = request('theme');
        $blogik->text = request('text');
        $blogik->id_author = Auth::user()->id;
        $blogik->name = request('name');
        $blogik->data = date("Y-m-d");
        $blogik->save();
        return redirect('/redactor');
        
    }

    public function load()
    {
        $file = request('message');
        $file->move(public_path('files'), $file->getClientOriginalName());
        $data = $this->readCSV(public_path('files')."\\".$file->getClientOriginalName(),
        array('delimiter' => ';'));
        //dd($data);
        for ($i = 0; $i<count($data); $i++)
        {
        $blog = new \App\Models\Blog();
        $blog->theme = $data[$i][0];
        $blog->text = $data[$i][1];
        $blog->id_author = $data[$i][2];
        $blog->name = $data[$i][3];
        $blog->data = $data[$i][4];
        $blog->save();
        }
        //return $this->readCSV("D:\OpenServer\OpenServer\domains\Laravel\public\\files\\".$file->getClientOriginalName(),
        //array('delimiter' => ';'));
        //return $list[0];
        return redirect('/load');
    }

    public function readCSV($csvFile, $array)
    {
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 0, $array['delimiter']);
        }
        fclose($file_handle);
        return $line_of_text;
    }
}
