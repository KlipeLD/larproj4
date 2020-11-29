<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store()
    {
        //$slug = Str::slug($name);
        $this->validateUser();
        $article =  new User(request(['name', 'nickname', 'surname', 'phone','sex']));
        $article->email_spam = request('showPhone');
        $article->email = 'test@test.com';
        $article->email = 'test@test.com';
        $article->password = '1'; //temp
        //avatar
        $article->save();
        return redirect(route('inf'));
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
