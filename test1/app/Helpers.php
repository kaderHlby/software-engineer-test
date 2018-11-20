<?php

namespace App;

class Helpers
{
    /**
     * Find corresponding closing parenthesis index by given open pran index.
     *
     * @param  $openParenIndex
     * @param  $string
     * @return $closeParenIndex
     */
    public function findCorrespondingClosingParenthesis($openParenthesisIndex, $string)
    {
        if ($string[$openParenthesisIndex] != "(") {
            throw new \Exception("Invaild open pran index.");
        }

        $closeParenthesisIndex = $openParenthesisIndex;
        $counter = 1;

        while ($counter > 0) {
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