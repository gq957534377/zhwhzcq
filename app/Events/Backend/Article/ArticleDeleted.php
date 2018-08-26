<?php

namespace App\Events\Backend\Article;

use Illuminate\Queue\SerializesModels;

/**
 * Class ArticleDeleted.
 */
class ArticleDeleted
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
