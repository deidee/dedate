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
        if(in_array($key, ['B', 'd', 'H', 'i', 'm', 'w', 'Y', 'z'])) {
            return idate($key, $this->timestamp);
        }

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

    // Wiki: https://www.urbandictionary.com/define.php?term=1337%20time
    public function is1337Time()
    {
        return $this->H === 13 && $this->i === 37;
    }
}