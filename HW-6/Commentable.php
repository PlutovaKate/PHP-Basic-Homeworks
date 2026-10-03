<?php

trait Commentable
{
    protected array $comments = [];

    public function addComment(string $text): void
    {
        $this->comments[] = $text;
    }

    public function comments(): array
    {
        return $this->comments;
    }


    public function badge(): string
    {
        return 'comments: ' . count($this->comments);
    }
}
