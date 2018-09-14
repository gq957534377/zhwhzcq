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

            $article = $article->toArray();
            if (! empty($article['atlas'])) {
                foreach ($article['atlas'] as & $atlas) {
                    $atlas['banner'] = $atlas['banner'];
                }
            }

            $resp['data'] = $article;

        } catch (\Exception $e) {
            $resp['error'] = $e->getMessage();
        }

        return $resp;
    }
}