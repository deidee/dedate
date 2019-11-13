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
        if(in_array($key, ['B', 'd', 'H', 'i', 'L', 'm', 'w', 'Y', 'z'])) {
            return idate($key, $this->timestamp);
        }

        // Build a theoretical method name.
        $method = 'is' . ucfirst($key);

        // Check if the above method actually exists in this class.
        if(method_exists($this, $method)) {
            // Return the method.
            return $this->$method();
        }

        // If all else fails, just return FALSE. Not exceptions here.
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
    public function is1337()
    {
        return $this->H === 13 AND $this->i === 37;
    }

    // Wiki: https://www.urbandictionary.com/define.php?term=1337%20time
    public function is1337Time()
    {
        return $this->is1337();
    }

    // Wiki: https://en.wikipedia.org/wiki/April_Fools%27_Day
    public function isAprilFools()
    {
        return $this->m === 4 AND $this->d === 1;
    }

    public function isAprilFoolsDay()
    {
        return $this->isAprilFools();
    }

    // Wiki: https://nl.wikipedia.org/wiki/Bevrijdingsdag
    public function isBevrijdingsdag()
    {
        return $this->m === 5 AND $this->d === 5;
    }

    // Wiki: https://en.wikipedia.org/wiki/Breast_Cancer_Awareness_Month
    public function isBreastCancerAwarenessMonth()
    {
        return $this->isOctober();
    }

    // Wiki: https://en.wikipedia.org/wiki/Caps_Lock#International_Caps_Lock_Day
    public function isCapsLockDay()
    {
        return $this->m === 10 AND $this->d === 22;
    }

    public function isInternationalCapsLockDay()
    {
        return $this->isCapsLockDay();
    }

    public function isChristmas()
    {
        return $this->m === 12 AND $this->d === 25;
    }

    public function isFriday()
    {
        return $this->w === 5;
    }

    // Site: https://proseccofriday.com/
    public function isProseccoFriday()
    {
        return $this->isFriday();
    }

    // Wiki: https://en.wikipedia.org/wiki/Groundhog_Day
    public function isGroundhogDay()
    {
        return $this->m === 2 AND $this->d === 2;
    }

    // Wiki: https://en.wikipedia.org/wiki/Halloween
    public function isHalloween()
    {
        return $this->isOctober() AND $this->d === 31;
    }

    // Wiki: https://en.wikipedia.org/wiki/International_Jazz_Day
    public function isInternationalJazzDay()
    {
        return $this->m === 4 AND $this->d === 30;
    }

    // Wiki: https://en.wikipedia.org/wiki/International_Jazz_Day
    public function isJazzDay()
    {
        return $this->isInternationalJazzDay();
    }

    // Wiki: https://en.wikipedia.org/wiki/International_Mother_Earth_Day
    public function isInternationalMotherEarthDay()
    {
        return $this->m === 4 AND $this->d === 22;
    }

    public function isMotherEarthDay()
    {
        return $this->isInternationalMotherEarthDay();
    }

    // Wiki: https://en.wikipedia.org/wiki/International_Talk_Like_a_Pirate_Day
    public function isInternationalTalkLikeAPirateDay()
    {
        return $this->m === 9 AND $this->d === 19;
    }

    // Wiki: https://en.wikipedia.org/wiki/International_Talk_Like_a_Pirate_Day
    public function isTalkLikeAPirateDay()
    {
        return $this->isInternationalTalkLikeAPirateDay();
    }

    // Wiki: https://en.wikipedia.org/wiki/International_Women%27s_Day
    public function isInternationalWomensDay()
    {
        return $this->m === 3 AND $this->d === 8;
    }

    // Wiki: https://en.wikipedia.org/wiki/International_Women%27s_Day
    public function isWomensDay()
    {
        return $this->isInternationalWomensDay();
    }

    public function isJanuary()
    {
        return $this->m === 1;
    }

    public function isJuly()
    {
        return $this->m === 7;
    }

    public function isJune()
    {
        return $this->m === 6;
    }

    public function isKingsDay()
    {
        return $this->isKoningsdag();
    }

    public function isKoninginnedag()
    {
        return $this->isKoningsdag();
    }

    // Wiki: https://nl.wikipedia.org/wiki/Koningsdag_(Nederland)
    public function isKoningsdag()
    {
        return $this->m === 4 AND (($this->d === 27 AND $this->w !== 0) || ($this->d === 26 AND $this->w === 6));
    }

    // Wiki: https://en.wikipedia.org/wiki/Leap_year
    public function isLeapYear()
    {
        return (bool) $this->L;
    }

    // Wiki: https://en.wikipedia.org/wiki/Liberation_Day_(Netherlands)
    public function isLiberationDay()
    {
        return $this->isBevrijdingsdag();
    }

    public function isMarch()
    {
        return $this->m === 3;
    }

    public function isMay()
    {
        return $this->m === 5;
    }

    public function isMonday()
    {
        return $this->w === 1;
    }

    public function isMovember()
    {
        return $this->isNovember();
    }

    public function isMyBirthday()
    {
        return $this->m === 8 AND $this->d === 29;
    }

    public function isNewYearsDay()
    {
        return $this->m === 1 AND $this->d === 1;
    }

    public function isNovember()
    {
        return $this->m === 11;
    }

    public function isOctober()
    {
        return $this->m === 10;
    }

    // Wiki: https://en.wikipedia.org/wiki/Pi_Day
    // Site: https://www.piday.org/
    public function isPiDay()
    {
        return $this->m === 3 AND $this->d === 14;
    }

    public function isPlayGodDay()
    {
        return $this->m === 1 AND $this->d === 9;
    }

    public function isPrinsessedag()
    {
        return $this->isKoningsdag();
    }

    // Wiki: https://en.wikipedia.org/wiki/Programmers'_Day
    public function isProgrammersDay()
    {
        return $this->Y >= 2002 AND $this->z === 256;
    }

    // Wiki: https://en.wikipedia.org/wiki/Remembrance_of_the_Dead
    public function isRemembranceOfTheDead()
    {
        return $this->m === 5 AND $this->d === 4;
    }

    public function isSaturday()
    {
        return $this->w === 6;
    }

    public function isSeptember()
    {
        return $this->m === 9;
    }

    public function isSteakAndBJDay()
    {
        return $this->m === 3 AND $this->d === 14;
    }

    public function isSunday()
    {
        return $this->w === 0;
    }

    public function isTheFirst()
    {
        return $this->d === 1;
    }

    public function isThursday()
    {
        return $this->w === 4;
    }

    public function isTuesday()
    {
        return $this->w === 2;
    }

    public function isValentines()
    {
        return $this->isValentinesDay();
    }

    public function isValentinesDay()
    {
        return $this->m === 2 AND $this->d === 14;
    }

    public function isWeekend()
    {
        return $this->isSaturday() || $this->isSunday();
    }

    public function isWednesday()
    {
        return $this->w === 3;
    }

    // Wiki: https://en.wikipedia.org/wiki/World_AIDS_Day
    public function isWorldAidsDay()
    {
        return $this->Y >= 1988 AND $this->m === 12 AND $this->d === 1;
    }

    // Wiki: https://en.wikipedia.org/wiki/World_Press_Freedom_Day
    public function isWorldPressFreedomDay()
    {
        return ($this->m === 5 AND $this->d === 3);
    }

    // Wiki: https://en.wikipedia.org/wiki/World_Water_Day
    public function isWorldWaterDay()
    {
        return $this->m === 3 AND $this->d === 22;
    }
}