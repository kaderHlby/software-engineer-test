<?php

namespace App;

class Helpers
{
    /**
     * Find corresponding closing parenthesis index by given open parenthesis index.
     *
     * @param  $openParenIndex
     * @param  $string
     * @return $closeParenIndex
     */
    public function findCorrespondingClosingParenthesis($openParenthesisIndex, $string)
    {
        // validate open parenthesis index
        if (($openParenthesisIndex > strlen($string) - 1) || $string[$openParenthesisIndex] != "(") {
            throw new \Exception("Invaild open parenthesis index.");
        }

        $closeParenthesisIndex = $openParenthesisIndex;
        $counter = 1;

        while ($counter > 0) {
            // throw exception if reach end of string without finding the corresponding closing parenthesis.
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