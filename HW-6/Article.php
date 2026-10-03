<?php

class Article
{
    // use Likeable, Commentable;

    use Likeable, Commentable {
        Likeable::badge insteadof Commentable;
        Commentable::badge as commentBadge;
    }


    private string $title;
    private string $author;

    public function __construct(string $title, string $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    public function card(): string
    {
        return 'Artice: "' . $this->title . '" (' . $this->author . ') - ' . $this->badge() . ' | ' . $this->commentBadge();
    }
}

// Fatal error: Trait method Commentable::badge has not been applied as Article::badge, because of collision with Likeable::badge in /var/www/html/Article.php on line 3
// Stack trace: #0 /var/www/html/index.php(6): require_once() #1 {main}
