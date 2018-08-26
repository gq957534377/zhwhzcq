<?php

namespace App\Events\Backend\Article;

use Illuminate\Queue\SerializesModels;

/**
 * Class ArticleUpdated.
 */
class ArticleUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $article;

    /**
     * @param $article
     */
    public function __construct($article)
    {
        $this->article = $article;
    }
}
