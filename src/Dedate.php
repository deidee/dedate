<?php
declare(strict_types=1);

namespace deidee\Dedate;

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
    public function is1337(): bool
    {
        return $this->H === 13 AND $this->i === 37;
    }

    // Wiki: https://www.urbandictionary.com/define.php?term=1337%20time
    public function is1337Time(): bool
    {
        return $this->is1337();
    }

    // https://en.wikipedia.org/wiki/Afternoon
    // Opinionated. Perhaps somewhat local. Also see https://nl.wikipedia.org/wiki/Middag_(tijd).
    public function isAfternoon(): bool
    {
        return $this->H >= 12 AND $this->H < 18;
    }

    // Wiki: https://en.wikipedia.org/wiki/April_Fools%27_Day
    public function isAprilFools(): bool
    {
        return $this->m === 4 AND $this->d === 1;
    }

    public function isAprilFoolsDay(): bool
    {
        return $this->isAprilFools();
    }

    // Wiki: https://nl.wikipedia.org/wiki/Bevrijdingsdag
    public function isBevrijdingsdag(): bool
    {
        return $this->m === 5 AND $this->d === 5;
    }

    // Wiki: https://en.wikipedia.org/wiki/Breast_Cancer_Awareness_Month
    public function isBreastCancerAwarenessMonth(): bool
    {
        return $this->isOctober();
    }

    // Wiki: https://en.wikipedia.org/wiki/Caps_Lock#International_Caps_Lock_Day
    public function isCapsLockDay(): bool
    {
        return $this->m === 10 AND $this->d === 22;
    }

    public function isInternationalCapsLockDay(): bool
    {
        return $this->isCapsLockDay();
    }

    public function isChristmas(): bool
    {
        return $this->m === 12 AND $this->d === 25;
    }

    // See https://css-naked-day.github.io/.
    public function isCSSNakedDay(): bool
    {
        $start = date('U', mktime(-12, 0, 0, 4, 9, date('Y')));
        $end = date('U', mktime(36, 0, 0, 4, 9, date('Y')));

        return $this->timestamp >= $start && $this->timestamp <= $end;
    }

    // https://en.wikipedia.org/wiki/Evening
    // Opinionated. Perhaps somewhat local. Also see https://nl.wikipedia.org/wiki/Avond.
    public function isEvening(): bool
    {
        return $this->H >= 18 AND $this->H <= 23;
    }

	public function isFathersDay(): bool
    {
		$fathersday = date('Y-m-d', strtotime("Third Sunday of June", $this->timestamp));

		return date('Y-m-d', $this->timestamp) === $fathersday;
	}

    public function isFriday(): bool
    {
        return $this->w === 5;
    }

    // Site: https://proseccofriday.com/
    public function isProseccoFriday(): bool
    {
        return $this->isFriday();
    }

    // Wiki: https://en.wikipedia.org/wiki/Groundhog_Day
    public function isGroundhogDay(): bool
    {
        return $this->m === 2 AND $this->d === 2;
    }

    // Wiki: https://en.wikipedia.org/wiki/Halloween
    public function isHalloween(): bool
    {
        return $this->isOctober() AND $this->d === 31;
    }

    // Wiki: https://en.wikipedia.org/wiki/International_Jazz_Day
    public function isInternationalJazzDay(): bool
    {
        return $this->m === 4 AND $this->d === 30;
    }

    // Wiki: https://en.wikipedia.org/wiki/International_Jazz_Day
    public function isJazzDay(): bool
    {
        return $this->isInternationalJazzDay();
    }

    // Wiki: https://en.wikipedia.org/wiki/International_Mother_Earth_Day
    public function isInternationalMotherEarthDay(): bool
    {
        return $this->m === 4 AND $this->d === 22;
    }

    // https://en.wikipedia.org/wiki/Morning
    // Opinionated. Perhaps somewhat local. Also see https://nl.wikipedia.org/wiki/Ochtend.
    public function isMorning(): bool
    {
        return $this->H >= 6 AND $this->H < 12;
    }

    public function isMotherEarthDay(): bool
    {
        return $this->isInternationalMotherEarthDay();
    }

    // Wiki: https://en.wikipedia.org/wiki/International_Talk_Like_a_Pirate_Day
    public function isInternationalTalkLikeAPirateDay(): bool
    {
        return $this->m === 9 AND $this->d === 19;
    }

    // Wiki: https://en.wikipedia.org/wiki/International_Talk_Like_a_Pirate_Day
    public function isTalkLikeAPirateDay(): bool
    {
        return $this->isInternationalTalkLikeAPirateDay();
    }

    // Wiki: https://en.wikipedia.org/wiki/International_Women%27s_Day
    public function isInternationalWomensDay(): bool
    {
        return $this->m === 3 AND $this->d === 8;
    }

    // Wiki: https://en.wikipedia.org/wiki/International_Women%27s_Day
    public function isWomensDay(): bool
    {
        return $this->isInternationalWomensDay();
    }

    public function isJanuary(): bool
    {
        return $this->m === 1;
    }

    public function isJuly(): bool
    {
        return $this->m === 7;
    }

    public function isJune(): bool
    {
        return $this->m === 6;
    }

    public function isKingsDay(): bool
    {
        return $this->isKoningsdag();
    }

    public function isKoninginnedag(): bool
    {
        return $this->isKoningsdag();
    }

    // Wiki: https://nl.wikipedia.org/wiki/Koningsdag_(Nederland)
    public function isKoningsdag(): bool
    {
        return $this->m === 4 AND (($this->d === 27 AND $this->w !== 0) || ($this->d === 26 AND $this->w === 6));
    }

    // Wiki: https://en.wikipedia.org/wiki/Leap_year
    public function isLeapYear(): bool
    {
        return (bool) $this->L;
    }

    // Wiki: https://en.wikipedia.org/wiki/Liberation_Day_(Netherlands)
    public function isLiberationDay(): bool
    {
        return $this->isBevrijdingsdag();
    }

    public function isMarch(): bool
    {
        return $this->m === 3;
    }

    public function isMay(): bool
    {
        return $this->m === 5;
    }

    public function isMonday(): bool
    {
        return $this->w === 1;
    }

    public function isMothersDay(): bool
    {
    	$mothersday = date('Y-m-d', strtotime("Second Sunday of May", $this->timestamp));

    	return date('Y-m-d', $this->timestamp) === $mothersday;
    }

    // https://en.wikipedia.org/wiki/Night
    // Opinionated. Perhaps somewhat local. Also see https://nl.wikipedia.org/wiki/Nacht.
    public function isNight(): bool
    {
        return $this->H >= 0 AND $this->H < 6;
    }

    public function isMovember(): bool
    {
        return $this->isNovember();
    }

    public function isMyBirthday(): bool
    {
        return $this->m === 8 AND $this->d === 29;
    }

    public function isNewYearsDay(): bool
    {
        return $this->m === 1 AND $this->d === 1;
    }

    // Wiki: https://en.wikipedia.org/wiki/New_Year%27s_Eve
    public function isNewYearsEve(): bool
    {
        return $this->m === 12 AND $this->d === 31;
    }

    public function isNovember(): bool
    {
        return $this->m === 11;
    }

    public function isOctober(): bool
    {
        return $this->m === 10;
    }

    // Wiki: https://en.wikipedia.org/wiki/Pi_Day
    // Site: https://www.piday.org/
    public function isPiDay(): bool
    {
        return $this->m === 3 AND $this->d === 14;
    }

    public function isPlayGodDay(): bool
    {
        return $this->m === 1 AND $this->d === 9;
    }

    public function isPrinsessedag(): bool
    {
        return $this->isKoningsdag();
    }

    // Wiki: https://en.wikipedia.org/wiki/Programmers'_Day
    public function isProgrammersDay(): bool
    {
        return $this->Y >= 2002 AND $this->z === 256;
    }

    // Wiki: https://en.wikipedia.org/wiki/Remembrance_of_the_Dead
    public function isRemembranceOfTheDead(): bool
    {
        return $this->m === 5 AND $this->d === 4;
    }

    public function isSaturday(): bool
    {
        return $this->w === 6;
    }

    public function isSeptember(): bool
    {
        return $this->m === 9;
    }

    public function isSteakAndBJDay(): bool
    {
        return $this->m === 3 AND $this->d === 14;
    }

    public function isSunday(): bool
    {
        return $this->w === 0;
    }

    public function isTheFirst(): bool
    {
        return $this->d === 1;
    }

    public function isThursday(): bool
    {
        return $this->w === 4;
    }

    public function isTuesday(): bool
    {
        return $this->w === 2;
    }

    public function isValentines(): bool
    {
        return $this->isValentinesDay();
    }

    public function isValentinesDay(): bool
    {
        return $this->m === 2 AND $this->d === 14;
    }

    public function isWeekend(): bool
    {
        return $this->isSaturday() || $this->isSunday();
    }

    public function isWednesday(): bool
    {
        return $this->w === 3;
    }

    // Wiki: https://en.wikipedia.org/wiki/World_AIDS_Day
    public function isWorldAidsDay(): bool
    {
        return $this->Y >= 1988 AND $this->m === 12 AND $this->d === 1;
    }

    // Wiki: https://en.wikipedia.org/wiki/World_Press_Freedom_Day
    public function isWorldPressFreedomDay(): bool
    {
        return ($this->m === 5 AND $this->d === 3);
    }

    // Wiki: https://en.wikipedia.org/wiki/World_Water_Day
    public function isWorldWaterDay(): bool
    {
        return $this->m === 3 AND $this->d === 22;
    }
}