<?php

namespace App;

class Helpers
{
    /**
     * Find corresponding closing paren index by given open pran index.
     *
     * @param  $openParenIndex
     * @param  $string
     * @return $closeParenIndex
     */
    public function findCorrespondingClosingParen($openParenIndex, $string)
    {
        if ($string[$openParenIndex] != "(") {
            throw new \Exception("Invaild open pran index.");
        }

        $closeParenIndex = $openParenIndex;
        $counter = 1;

        while ($counter > 0) {
            $character = $string[++$closeParenIndex];
            if ($character == '(') {
                $counter++;
            } else if ($character == ')') {
                $counter--;
            }
        }

        return $closeParenIndex;
    }
}   