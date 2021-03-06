<?php

namespace Garbetjie\WeChatClient\Media\Type;

use InvalidArgumentException;

class NewsItem
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $thumbnailMediaID;

    /**
     * @var string
     */
    protected $author;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $summary;

    /**
     * @var bool
     */
    protected $showImage = true;

    /**
     * NewsItem constructor.
     *
     * @param string $title
     * @param string $content
     * @param string $thumbnailMediaID
     */
    public function __construct ($title, $content, $thumbnailMediaID)
    {
        $this->title = $title;
        $this->content = $content;
        $this->thumbnailMediaID = $thumbnailMediaID;
    }

    /**
     * Sets the name of the author of the article.
     *
     * @param string $author
     *
     * @return static
     */
    public function withAuthor ($author)
    {
        $new = clone $this;
        $new->author = $author;

        return $new;
    }

    /**
     * Populates the URL to be used when clicking on "View more" in an article.
     *
     * @param string $url
     *
     * @return static
     * @throws InvalidArgumentException
     */
    public function withURL ($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new InvalidArgumentException("invalid url `{$url}` given for news item");
        }

        $new = clone $this;
        $new->url = $url;

        return $new;
    }

    /**
     * Adds the summary to the article item.
     *
     * @param string $summary
     *
     * @return static
     */
    public function withSummary ($summary)
    {
        $new = clone $this;
        $new->summary = $summary;

        return $new;
    }

    /**
     * Sets a flag indicating whether or not the cover image should be showing.
     *
     * @param bool $showImage
     *
     * @return static
     */
    public function withImageShowing ($showImage)
    {
        $new = clone $this;
        $new->showImage = !! $showImage;

        return $new;
    }

    /**
     * @return string
     */
    public function getTitle ()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent ()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getThumbnailMediaID ()
    {
        return $this->thumbnailMediaID;
    }

    /**
     * @return string
     */
    public function getAuthor ()
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getURL ()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getSummary ()
    {
        return $this->summary;
    }

    /**
     * @return boolean
     */
    public function isImageShowing ()
    {
        return $this->showImage;
    }
}
