<?php

namespace Garbetjie\WeChatClient\Media\Type;

use InvalidArgumentException;

class News
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * News constructor.
     *
     * @param array $items
     */
    public function __construct (array $items)
    {
        foreach ($items as $item) {
            if (! ($item instanceof NewsItem)) {
                throw new InvalidArgumentException("news item not instance of " . NewsItem::class);
            }
        }
        
        $this->items = $items;
    }

    /**
     * Adds a new item to the article.
     *
     * @param NewsItem $item
     *
     * @return static
     */
    public function withItem (NewsItem $item)
    {
        $new = clone $this;
        $new->items[] = $item;
        
        return $new;
    }

    /**
     * @return NewsItem[]
     */
    public function getItems ()
    {
        return $this->items;
    }
}
