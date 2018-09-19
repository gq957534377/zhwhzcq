<?php
/**
 * Created by PhpStorm.
 * User: lindowx
 * Date: 2018/9/14
 * Time: 17:45
 */
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    public function index()
    {

    }

    public function article($id)
    {
        $resp = [
            'data'  => null,
            'error' => null,
        ];

        try {
            $article = Article::find($id);
            if (empty($article)) {
                throw new \Exception('404 Not Found');
            }

            $resp['data'] = $article->toArray();

        } catch (\Exception $e) {
            $resp['error'] = $e->getMessage();
        }

        return $resp;
    }
}