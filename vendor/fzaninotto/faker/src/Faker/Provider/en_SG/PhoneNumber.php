<?php

namespace Faker\Provider\en_SG;

use Faker\Factory;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $internationalCodePrefix = array(
        '+65',
        '65',
    );

    protected static $zeroToEight = array(0, 1, 2, 3, 4, 5, 6, 7, 8);

    protected static $oneToNine = array(1, 2, 3, 4, 5, 6, 7, 8, 9);

    protected static $mobileNumberFormats = array(
        '{{internationalCodePrefix}}9{{zeroToEight}}## ####',
        '{{internationalCodePrefix}} 9{{zeroToEight}}## ####',
        '9{{zeroToEight}}## ####',
        '{{internationalCodePrefix}}8{{oneToNine}}## ####',
        '{{internationalCodePrefix}} 8{{oneToNine}}## ####',
        '8{{oneToNine}}## ####',
        '{{internationalCodePrefix}}7{{oneToNine}}## ####',
        '{{internationalCodePrefix}} 7{{oneToNine}}## ####',
        '7{{oneToNine}}## ####',
    );

    protected static $fixedLineNumberFormats = array(
        '{{internationalCodePrefix}}6### ####',
        '{{internationalCodePrefix}} 6### ####',
        '6### ####',
    );

    // https://en.wikipedia.org/wiki/Telephone_numbers_in_Singapore#Numbering_plan
    protected static $formats = array(
        '{{mobileNumber}}',
        '{{fixedLineNumber}}',
    );

    protected static $voipNumber = array(
        '{{internationalCodePrefix}}3### ####',
        '{{internationalCodePrefix}} 3### ####',
        '3### ####',
    );

    protected static $tollFreeInternationalNumber = array(
        '800 ### ####'
    );

    protected static $tollFreeLineNumber = array(
        '1800 ### ####'
    );

    protected static $premiumPhoneNumber = array(
        '1900 ### ####'
    );

    public function tollFreeInternationalNumber()
    {
        return static::randomElement(static::$tollFreeInternationalNumber);
    }

    public function tollFreeLineNumber()
    {
        return static::randomElement(static::$tollFreeLineNumber);
    }

    public function premiumPhoneNumber()
    {
        return static::randomElement(static::$premiumPhoneNumber);
    }

    public function mobileNumber()
    {
        $format = static::randomElement(static::$mobileNumberFormats);

        return static::numerify($this->generator->parse($format));
    }

    public function fixedLineNumber()
    {
        $format = static::randomElement(static::$fixedLineNumberFormats);

        return static::numerify($this->generator->parse($format));
    }

    public function voipNumber()
    {
        $format = static::randomElement(static::$voipNumber);

        return $this->generator->parse($format);
    }

    public function internationalCodePrefix()
    {
        $format = static::randomElement(static::$internationalCodePrefix);

        return $this->generator->parse($format);
    }

    public function zeroToEight()
    {
        return static::randomElement(static::$zeroToEight);
    }

    public function oneToNine()
    {
        return static::randomElement(static::$oneToNine);
    }
}
