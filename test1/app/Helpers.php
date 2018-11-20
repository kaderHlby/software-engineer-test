<?php

namespace App;

class Helpers
{
    /**
     * Find corresponding closing parenthesis index by given open parenthesis index.
     *
     * @param  $openParenthesisIndex
     * @param  $string
     * @return $closeParenthesisIndex
     */
    public function findCorrespondingClosingParenthesis($openParenthesisIndex, $string)
    {
        // Passed $openParenthesisIndex should be less than the string length, not the last character and an index of open parenthessis.
        if (($openParenthesisIndex > strlen($string) - 2) || ($string[$openParenthesisIndex] != "(")) {
            throw new \Exception("Invaild open parenthesis index.");
        }

        $closeParenthesisIndex = $openParenthesisIndex;
        $counter = 1;

        while ($counter > 0) {
            // Throw exception if reach end of string without finding the corresponding closing parenthesis.
            if ($closeParenthesisIndex > strlen($string) - 2) {
                throw new \Exception("Invaild string.");
            }
            $character = $string[++$closeParenthesisIndex];
            if ($character == '(') {
                $counter++;
            } else if ($character == ')') {
                $counter--;
            }
        }

        return $closeParenthesisIndex;
    }
}   