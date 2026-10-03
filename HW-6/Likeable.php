<?php

trait Likeable
{
    protected int $likes = 0;

    public function like(): void
    {
        $this->likes++;
    }

    public function likes(): int
    {
        return $this->likes;
    }

    public function badge(): string
    {
        return 'likes: ' . $this->likes;
    }
}
