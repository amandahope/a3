@extends('layouts.master')

@section('title')
    Scrabble Word Score Calculator
@endsection

@section('content')

    <form method="GET" action="/">

        <div class="row">
            <span class="help-block col-xs-12">Fields marked with * are required.</span>
        </div>

        <div class="row" id="lettersparent">

            @for ($i=1; $i<9; $i++)
                <fieldset class="col-xs-1">
                    <legend>
                        @if($i<3)
                            *Letter {{$i}}:
                        @else
                            Letter {{$i}}:
                        @endif
                    </legend>
                    <select name="letter{{$i}}[]" id="letter{{$i}}" class="form-control">
                        @foreach ($selectMenuArray as $option => $value)
                            <option value="{{$value}}" @if (old("letter".$i.".0") == $value) {{"SELECTED"}} @elseif (${"letter".$i} == $value) {{"SELECTED"}} @endif>{{$option}}</option>
                        @endforeach
                    </select>
                    @foreach ($radioArray as $option => $value)
                        <div class="radio">
                            <label for="{{$value}}{{$i}}">
                                <input type="radio" name="letter{{$i}}[]" value="{{$value}}" id="{{$value}}{{$i}}" @if (old("letter".$i.".1") == $value) {{"CHECKED"}} @elseif (${"letter".$i."Bonus"} == $value) {{"CHECKED"}} @endif />{{$option}}
                            </label>
                        </div>
                    @endforeach
                </fieldset>
            @endfor

        </div>

        <div class="row">
            <div class="checkbox form-group col-xs-12">
                <label for="bingo">
                    <input type="checkbox" name="bingo" value="bingo" id="bingo" @if (old("bingo") == $value) {{"CHECKED"}} @elseif ($bingo == $value) {{"CHECKED"}} @endif />This word used all seven tiles.
                </label>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-2">
                <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                <button type="button" value="reset" class="btn btn-default" id="reset">Reset Form</button>
            </div>
        </div>
    </form>

    <div>

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach (array_unique($errors->all()) as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @elseif (!empty($request->all()))
            @if(!empty($warnings))
                <div class="alert alert-warning">
                    @foreach($warnings as $warning)
                        <ul class="list-unstyled">
                            <li>{{$warning}}</li>
                        </ul>
                    @endforeach
                </div>
            @endif

            <div class="alert alert-info">
                Your word, {{$userWord}}, is worth {{$score}} points.
            </div>
        @endif
    </div>

@endsection
