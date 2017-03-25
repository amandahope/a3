@extends('layouts.master')

@section('letters')

    @for ($i=1; $i<9; $i++)
    <fieldset class="col-xs-1">
        <legend>
            @if($i<3)
                *Letter {{$i}}:
            @else
                Letter {{$i}}:
            @endif
        </legend>
        <select name="letter{{$i}}[]" class="form-control">
            <option value="">&nbsp;</option>
            <option value="_">BLANK</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
            <option value="G">G</option>
            <option value="H">H</option>
            <option value="I">I</option>
            <option value="J">J</option>
            <option value="K">K</option>
            <option value="L">L</option>
            <option value="M">M</option>
            <option value="N">N</option>
            <option value="O">O</option>
            <option value="P">P</option>
            <option value="Q">Q</option>
            <option value="R">R</option>
            <option value="S">S</option>
            <option value="T">T</option>
            <option value="U">U</option>
            <option value="V">V</option>
            <option value="W">W</option>
            <option value="X">X</option>
            <option value="Y">Y</option>
            <option value="Z">Z</option>
        </select>
        <div class="radio">
            <label for="none1">
                <input type="radio" name="letter1[]" value="none" id="none1" />No Bonus
            </label>
        </div>
        <div class="radio">
            <label for="doubleletter1">
                <input type="radio" name="letter1[]" value="doubleletter" id="doubleletter1" />Letter x2
            </label>
        </div>
        <div class="radio">
            <label for="tripleletter1">
                <input type="radio" name="letter1[]" value="tripleletter" id="tripleletter1" />Letter x3
            </label>
        </div>
        <div class="radio">
            <label for="doubleword1">
                <input type="radio" name="letter1[]" value="doubleword" id="doubleword1" />Word x2
            </label>
        </div>
        <div class="radio">
            <label for="tripleword1">
                <input type="radio" name="letter1[]" value="tripleword" id="tripleword1" />Word x3
            </label>
        </div>
    </fieldset>
    @endfor

@endsection
