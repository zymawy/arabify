<?php

namespace Zymawy\Arabify;

class SlugOptions
{
    /** @var string|array|callable */
    public $generateSlugFrom = 'name';

    /** @var string */
    public $slugField = 'slug';

    /** @var bool */
    public $generateUniqueSlug = true;

    /** @var int */
    public $maximumLength = 250;

    /** @var bool */
    public $generateSlugOnCreate = true;

    /** @var bool */
    public $generateSlugOnUpdate = true;

    /** @var string */
    public $slugSeparator = '-';

    /**
     * Create new instance of the Slug Options
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * @param string|array|callable $fieldName
     *
     * @return \Bpocallaghan\Sluggable\SlugOptions
     */
    public function generateSlugFrom($fieldName)
    {
        $this->generateSlugFrom = $fieldName;

        return $this;
    }

    /**
     * Update the slug field name
     * @param string $fieldName
     * @return $this
     */
    public function saveSlugTo($fieldName)
    {
        $this->slugField = $fieldName;

        return $this;
    }

    /**
     * If the slug must be unique
     * @param bool $unique
     * @return $this
     */
    public function makeSlugUnique($unique = true)
    {
        $this->generateUniqueSlug = $unique;

        return $this;
    }

    /**
     * Set the maximum length
     * @param int $maximumLength
     * @return $this
     */
    public function maximumLength($maximumLength = 250)
    {
        $this->maximumLength = $maximumLength;

        return $this;
    }

    /**
     * If we need to generate a slug on create
     * @param bool $onCreate
     * @return $this
     */
    public function generateSlugOnCreate($onCreate = true)
    {
        $this->generateSlugOnCreate = $onCreate;

        return $this;
    }

    /**
     * If we need to generate a slug on update
     * @param bool $onUpdate
     * @return $this
     */
    public function generateSlugOnUpdate($onUpdate = true)
    {
        $this->generateSlugOnUpdate = $onUpdate;

        return $this;
    }

    /**
     * Set the slug seperator
     * @param string $separator
     * @return $this
     */
    public function slugSeperator($separator = '-')
    {
        $this->slugSeparator = $separator;

        return $this;
    }
}
