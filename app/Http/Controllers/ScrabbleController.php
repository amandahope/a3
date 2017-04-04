<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrabbleController extends Controller
{
    /**
    * GET /
    */
    public function index(Request $request) {

        $lettersArray = $request->all();

        $letter1 = (isset($lettersArray["letter1"][0])) ?
            $lettersArray["letter1"][0] : "";
        $letter1Bonus = (isset($lettersArray["letter1"][1])) ?
            $lettersArray["letter1"][1] : "";

        $letter2 = (isset($lettersArray["letter2"][0])) ?
            $lettersArray["letter2"][0] : "";
        $letter2Bonus = (isset($lettersArray["letter2"][1])) ?
            $lettersArray["letter2"][1] : "";

        $letter3 = (isset($lettersArray["letter3"][0])) ?
            $lettersArray["letter3"][0] : "";
        $letter3Bonus = (isset($lettersArray["letter3"][1])) ?
            $lettersArray["letter3"][1] : "";

        $letter4 = (isset($lettersArray["letter4"][0])) ?
            $lettersArray["letter4"][0] : "";
        $letter4Bonus = (isset($lettersArray["letter4"][1])) ?
            $lettersArray["letter4"][1] : "";

        $letter5 = (isset($lettersArray["letter5"][0])) ?
            $lettersArray["letter5"][0] : "";
        $letter5Bonus = (isset($lettersArray["letter5"][1])) ?
            $lettersArray["letter5"][1] : "";

        $letter6 = (isset($lettersArray["letter6"][0])) ?
            $lettersArray["letter6"][0] : "";
        $letter6Bonus = (isset($lettersArray["letter6"][1])) ?
            $lettersArray["letter6"][1] : "";

        $letter7 = (isset($lettersArray["letter7"][0])) ?
            $lettersArray["letter7"][0] : "";
        $letter7Bonus = (isset($lettersArray["letter7"][1])) ?
            $lettersArray["letter7"][1] : "";

        $letter8 = (isset($lettersArray["letter8"][0])) ?
            $lettersArray["letter8"][0] : "";
        $letter8Bonus = (isset($lettersArray["letter8"][1])) ?
            $lettersArray["letter8"][1] : "";

        $errors = "";
        $bingo = "";
        $userWord = "";
        $score = "0";
        $warnings = [];


        $selectMenuArray = [
            "&nbsp;" => "",
            "BLANK" => "_",
            "A" => "A",
            "B" => "B",
            "C" => "C",
            "D" => "D",
            "E" => "E",
            "F" => "F",
            "G" => "G",
            "H" => "H",
            "I" => "I",
            "J" => "J",
            "K" => "K",
            "L" => "L",
            "M" => "M",
            "N" => "N",
            "O" => "O",
            "P" => "P",
            "Q" => "Q",
            "R" => "R",
            "S" => "S",
            "T" => "T",
            "U" => "U",
            "V" => "V",
            "W" => "W",
            "X" => "X",
            "Y" => "Y",
            "Z" => "Z"
        ];

        $radioArray = [
            "No Bonus" => "none",
            "Letter x2" => "doubleletter",
            "Letter x3" => "tripleletter",
            "Word x2" => "doubleword",
            "Word x3" => "tripleword"
        ];

        $valuesArray = [
            "_" => 0,
            "A" => 1,
            "B" => 3,
            "C" => 3,
            "D" => 2,
            "E" => 1,
            "F" => 4,
            "G" => 2,
            "H" => 4,
            "I" => 1,
            "J" => 8,
            "K" => 5,
            "L" => 1,
            "M" => 3,
            "N" => 1,
            "O" => 1,
            "P" => 3,
            "Q" => 10,
            "R" => 1,
            "S" => 1,
            "T" => 1,
            "U" => 1,
            "V" => 4,
            "W" => 4,
            "X" => 8,
            "Y" => 4,
            "Z" => 10
        ];

        if($lettersArray) {

            $this->validate($request, [
                'letter1.0' => 'required',
                'letter2.0' => 'required',
                'letter1.1' => 'bail|bonus_spacing|tripleletter_coexist|
                    doubletripleword_spacing|tripleletter_spacing',
                'letter2.1' => 'bail|bonus_spacing|tripleletter_coexist|
                    doubletripleword_spacing|tripleletter_spacing',
                'letter3.1' => 'bail|bonus_spacing|tripleletter_coexist|
                    doubletripleword_spacing|tripleletter_spacing',
                'letter4.1' => 'bail|bonus_spacing|tripleletter_coexist|
                    doubletripleword_spacing|tripleletter_spacing',
                'letter5.1' => 'bail|bonus_spacing|tripleletter_coexist|
                    doubletripleword_spacing|tripleletter_spacing',
                'letter6.1' => 'bail|bonus_spacing|tripleletter_coexist|
                    doubletripleword_spacing|tripleletter_spacing',
                'letter7.1' => 'bail|bonus_spacing|tripleletter_coexist|
                    doubletripleword_spacing|tripleletter_spacing',
                'letter8.1' => 'bail|bonus_spacing|tripleletter_coexist|
                    doubletripleword_spacing|tripleletter_spacing'
            ]);

            $userWord = trim($letter1.$letter2.$letter3.
                $letter4.$letter5.$letter6.$letter7.$letter8);
            $bingo = $request->has("bingo");

            #for each letter passed in through the form, cycle through
            #array of values until a match is found
            foreach($lettersArray as $letterNumber => $wordLetter) {
                foreach($valuesArray as $letter => $value) {
                    if($letter == $wordLetter[0]) {

                        #once a match is found, see if the letter has a letter bonus
                        #and if so, multiply before adding value to score
                        if(isset($wordLetter[1])) {
                            if ($wordLetter[1] == "doubleletter") {
                                $score += ($value * 2);
                                break;
                            } elseif ($wordLetter[1] == "tripleletter") {
                                $score += ($value * 3);
                                break;

                            #if no bonus, just add value to score
                            } else {
                                $score += $value;
                                break;
                            }
                        } else {
                            $score += $value;
                            break;

                            #loop ends once match is found

                        }
                    }
                }
            }


            #go through form input array again, checking for word scores
            foreach($lettersArray as $letterNumber => $wordLetter) {
                if(isset($wordLetter[1])) {

                    #if found, make sure there's a corresponding letter
                    if($wordLetter[0]!="") {

                        #if found, multiply score accordingly
                        if($wordLetter[1] == "doubleword") {
                            $score = $score * 2;
                        } elseif($wordLetter[1] == "tripleword") {
                            $score = $score * 3;
                        }
                    }
                }
            }

            #add bingo points, if necessary
            if($bingo) {

                #when bingo has been selected, the last item in the array is
                #the bingo, not a letter, so it is removed first
                array_pop($lettersArray);

                #find out how many letters have been entered
                $numberOfLetters = 0;
                foreach($lettersArray as $letterNumber => $wordLetter) {
                    if($wordLetter[0]!="") {
                        ++$numberOfLetters;
                    }
                }

                #if at least 7, add bingo bonus
                if($numberOfLetters > 6) {
                    $score = $score + 50;
                }
            }

            $warnings = [];

            #If a bonus has been selected, make sure its corresponding letter
            #has also been selected
            foreach($lettersArray as $letterNumber => $wordLetter) {
                if(isset($wordLetter[1]) && $wordLetter[1] != "none") {

                    #If not, issue a warning
                    if($wordLetter[0] == "") {
                        $warnings[] = "If you have not selected a letter, you cannot
                        activate a bonus for that letter. Bonus for ".$letterNumber."
                        was not included in the calculation of your score. (Hint:
                        Trying to use a blank tile? Choose BLANK from the menu.)";
                    }
                }
            }

            #If bingo bonus has been selected, check that at least 7 letters
            #were used, and issue a warning if not.
            if($bingo) {

                #when bingo has been selected, the last item in the array is
                #the bingo, not a letter, so it is removed first
                array_pop($lettersArray);

                #find out how many letters have been entered
                $numberOfLetters = 0;
                foreach($lettersArray as $letterNumber => $wordLetter) {
                    if($wordLetter[0]!="") {
                        ++$numberOfLetters;
                    }
                }

                #if less than 7, issue warning
                if($numberOfLetters < 7) {
                    $warnings[] = "To claim a bonus for using all seven tiles,
                        your word must have at least seven letters. Bonus for
                        using all tiles was not included in the calculation of
                        your score.";
                }
            }
        }

        return view('scrabble.index')->with([
            'selectMenuArray' => $selectMenuArray,
            'radioArray' => $radioArray,
            'letter1' => $letter1,
            'letter1Bonus' => $letter1Bonus,
            'letter2' => $letter2,
            'letter2Bonus' => $letter2Bonus,
            'letter3' => $letter3,
            'letter3Bonus' => $letter3Bonus,
            'letter4' => $letter4,
            'letter4Bonus' => $letter4Bonus,
            'letter5' => $letter5,
            'letter5Bonus' => $letter5Bonus,
            'letter6' => $letter6,
            'letter6Bonus' => $letter6Bonus,
            'letter7' => $letter7,
            'letter7Bonus' => $letter7Bonus,
            'letter8' => $letter8,
            'letter8Bonus' => $letter8Bonus,
            'request' => $request,
            'userWord' => $userWord,
            'bingo' => $bingo,
            'score' => $score,
            'warnings' => $warnings
        ]);
    }

}
