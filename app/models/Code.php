<?php

/**
 * Generate codes for identification
 */

namespace Model;

class Code
{
    private static $alphaNumeric = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    private static $digits = '0123456789';

    // Generate a unique alphanumeric string
    public static function mixed_alphanumeric($length = 15)
    {
        $alphaNumericLength = strlen(self::$alphaNumeric);
        $uniqueValue = '';

        // Choose a random letter to be the first character of the unique ID
        $uniqueValue .= chr(random_int(65, 90));

        for ($i = 1; $i < $length; $i++) {
            $index = random_int(0, $alphaNumericLength - 1);
            $uniqueValue .= self::$alphaNumeric[$index];
        }

        return $uniqueValue;
    }
    // generate uuid v4 string (a 36 long characters of mixed alphanumeric)
    public static function uuid_v4()
    {
        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // Set version to 4
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // Set bits 6-7 to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    // generate a unique strings for digits for id
    public static function codeDigits($length = 9)
    {
        $uniqueValue = '';
        for ($i = 1; $i < $length; $i++) {
            $index = rand(0, strlen(self::$digits) - 1);
            $uniqueValue .= self::$digits[$index];
        }

        return $uniqueValue;
    }

    // Generate a 6 digit length OTP
    public static function OTP()
    {
        $uniqueValue = '';
        $otpLength = 6;
        for ($i = 0; $i < $otpLength; $i++) {
            $uniqueValue .= self::$digits[rand(0, strlen(self::$digits) - 1)];
        }
        return $uniqueValue;
    }
}
