<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;

class ArticleController extends Controller
{

    public function author($author,Exception $e)
    {
        try
        {
            $user = new User;
            $recipe = $user->getById($author->id);

            if($recipe->id !== $author->id )
            {
                throw new Exception('Передаваемый объект не является пользователем');
            }
            else
            {
                if(!empty(\request('article')))
                {
                    $user = DB::table('article_user')
                        ->where('user_id',$author->id)
                        ->where('article_id',request('article'))
                        ->first();
                    if(empty($user))
                    {
                        return 0;
                    }
                    elseif($user->deleted_at == null)
                    {
                        return 1;
                    }
                    else
                    {
                        return null;
                    }
                }
            }
        }
        catch (Exception $e)
        {
           return 'Выброшено исключение: '.  $e->getMessage(). "\n";
        }
    }
}
