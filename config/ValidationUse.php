<?php

class ValidationUse
{
    public static function sanitizeString($string)
    {
        return filter_var($string, FILTER_SANITIZE_STRING);
    }

    public static function sanitizeEmail($email)
    {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}