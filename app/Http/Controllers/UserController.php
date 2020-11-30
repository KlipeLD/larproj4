<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ImageInt;
use Intervention\Image\ImageManager;
use App\Models\User;

class UserController extends Controller
{
    public function show()
    {

        return view('user');
    }
    public function showInf($id)
    {
        $user = User::where('id', $id)
            ->firstOrFail();
        return view('inf',[
            'user' =>$user,
        ]);
    }
    public function store()
    {
        $this->validateUser();
        $article =  new User();
        $article->name = request('name');
        $article->nickname = request('nickname');
        $article->surname = request('surname');
        $article->phone = request('phone');
        $article->sex = 1;
        if(\request('spamAgree') == 'on')
        {
            $article->email_spam = 1;
        }
        else
        {
            $article->email_spam = 0;
        }
        if(\request('sex') == '1')
        {
            $article->sex = 1;
        }
        else
        {
            $article->sex = 0;
        }
        $article->email = 'test'.rand().'@test.com'; //temp
        $article->password = '1'; //temp
        //avatar
        $path = public_path().'\img\profile\\';
        $file = \request('file');

        foreach ($file as $f) {
            $filename = mt_rand() .'.' . $f->getClientOriginalExtension() ?: 'png';
            $img = ImageInt::make($f);
            $img->resize(200,200)->save($path . $filename);
            $article->avatar = $filename;
        }
        $article->save();
        return redirect(route('showInf',['id'=>$article->id]));
    }
    protected function validateUser()
    {
        request()->validate([
            'name'=> ['required','max:255'],
            'nickname' => 'required',
            'phone' => 'required'
        ]);
    }
}
