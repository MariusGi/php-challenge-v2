<?php

namespace App;

class Jurgis
{
    public function responds(string $message): string
    {
        return $this->getResponse($message);
    }

    private function getResponse(string $message): string
    {
        $message = trim($message);

        if ($message === '') {
            return 'Alio! Kuku?';
        }

        if ($this->checkIfStringShouts($message) === true) {
            return 'Oi oi, atvėsk!';
        }

        if ($this->checkIfStringAsks($message)) {
            return 'Okis.';
        }

        return 'Aha gerai.';
    }

    private function checkIfStringShouts(string $message): bool
    {
        if (substr($message, '-1') === '!') {
            return true;
        }

        /*
         * Check if string changes using strtolower function to make sure entering numbers is not considered as shout
         * And check if string is equal to string after using strtoupper function to make sure all capital letters are entered
         */
        if ($message !== strtolower($message) && $message === strtoupper($message)) {
            return true;
        }

        return false;
    }

    private function checkIfStringAsks(string $message): bool
    {
        if (substr($message, '-1') === '?') {
            return true;
        }

        return false;
    }
}
