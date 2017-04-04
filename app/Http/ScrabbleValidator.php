<?php

namespace App\Http;

class ScrabbleValidator {

    public function validateBonusSpacing($attribute, $value, $parameters,
    $validator) {
        $lettersArray = $validator->getData();
        if ($value != "none" && $value != null) {
            $i=1;
            foreach ($lettersArray as $letterNumber => $wordLetter) {
                if ($letterNumber.".1" == $attribute) {
                    if (isset($lettersArray["letter".($i-1)][1])) {
                        if ($lettersArray["letter".($i-1)][1] != "none") {
                            return false;
                        }
                    }
                    if (isset($lettersArray["letter".($i+1)][1])) {
                        if ($lettersArray["letter".($i+1)][1] != "none") {
                            return false;
                        } else {
                            return true;
                        }
                    } else {
                        return true;
                    }
                }
                $i++;
            }
        } else {
            return true;
        }
    }

    public function validateTripleLetterCoexist($attribute, $value, $parameters,
    $validator) {
        $lettersArray = $validator->getData();
        if ($value == "tripleletter") {
            foreach ($lettersArray as $letterNumber => $wordLetter) {
                if (isset($wordLetter[1])) {
                    if ($wordLetter[1] == "doubleletter" ||
                    $wordLetter[1] == "tripleword") {
                        return false;
                    }
                }
            }
            return true;
        } else {
            return true;
        }
    }

    public function validateDoubleTripleWordSpacing($attribute, $value, $parameters,
    $validator) {
        $lettersArray = $validator->getData();
        if ($value == "doubleword" || $value == "tripleword") {
            $i=1;
            foreach ($lettersArray as $letterNumber => $wordLetter) {
                if ($letterNumber.".1" == $attribute) {
                    if (isset($lettersArray["letter".($i-2)][1])) {
                        if ($lettersArray["letter".($i-2)][1] != "none") {
                            return false;
                        }
                    }
                    if (isset($lettersArray["letter".($i+2)][1])) {
                        if ($lettersArray["letter".($i+2)][1] != "none") {
                            return false;
                        } else {
                            return true;
                        }
                    } else {
                        return true;
                    }
                }
                $i++;
            }
        } else {
            return true;
        }
    }

    public function validateTripleLetterSpacing($attribute, $value, $parameters,
    $validator) {
        $lettersArray = $validator->getData();
        if ($value == "tripleletter") {
            $i=1;
            foreach ($lettersArray as $letterNumber => $wordLetter) {
                if ($letterNumber.".1" == $attribute) {
                    if (isset($lettersArray["letter".($i-2)][1])) {
                        if ($lettersArray["letter".($i-2)][1] != "none") {
                            return false;
                        }
                    }
                    if (isset($lettersArray["letter".($i+2)][1])) {
                        if ($lettersArray["letter".($i+2)][1] != "none") {
                            return false;
                        }
                    }
                    if (isset($lettersArray["letter".($i-3)][1])) {
                        if ($lettersArray["letter".($i-3)][1] != "none") {
                            return false;
                        }
                    }
                    if (isset($lettersArray["letter".($i+3)][1])) {
                        if ($lettersArray["letter".($i+3)][1] != "none") {
                            return false;
                        } else {
                            return true;
                        }
                    } else {
                        return true;
                    }
                }
                $i++;
            }
        } else {
            return true;
        }
    }

}
