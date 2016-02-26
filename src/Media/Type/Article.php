<?php

namespace Garbetjie\WeChatClient\Media\Type;

use InvalidArgumentException;

class Article extends AbstractType
{
    /**
     * @var string
     */
    protected $type = 'news';

    /**
     * @var array
     */
    protected $items = [ ];

    /**
     * Adds a new item to the article.
     *
     * @param array $item
     */
    public function addItem ( array $item )
    {
        $formatted = [ ];

        // Check required keys.
        foreach ( [ 'title', 'content', 'thumbnail' ] as $key ) {
            if ( ! isset( $item[ $key ] ) ) {
                throw new InvalidArgumentException( "Item key '{$key}' is required." );
            } else {
                $formatted[ $key ] = $item[ $key ];
            }
        }

        // Add additional keys.
        foreach ( [ 'author', 'url', 'summary', 'cover' ] as $key ) {
            $formatted[ $key ] = isset( $item[ $key ] ) ? $item[ $key ] : null;
        }

        $this->items[] = $formatted;
    }

    /**
     * @return array
     */
    public function getItems ()
    {
        return $this->items;
    }
}
