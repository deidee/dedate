<?php

class Dedate
{
    // Default output format.
    public $format = 'Y-m-d';

    public function __construct($timestamp = FALSE)
    {
        // Set explicitly defined time, or current time.
        $this->timestamp = !empty($timestamp) ? intval($timestamp) : time();
    }

    public function __get($key)
    {
        return FALSE;
    }

    public function __set($key, $value = NULL)
    {
        $this->$key = $value;
    }

    // Echo in format.
    public function __toString()
    {
        return date($this->format, $this->timestamp);
    }

}