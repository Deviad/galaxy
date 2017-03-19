<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Universum</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12" style="margin:25px 0">

            {{ Form::open(array('url' => '/registration')) }}

            {{ csrf_field() }}

            <br>
            <input type="hidden" name="event_id" value="{{$fields[0]->event_id }}">

            <div class="row">
                <div class="form-group col-lg-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-3">
                    <label for="surname">Surname:</label>
                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter surname">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-3">
                    <label for="telephone">Telephone:</label>
                    <input type="text" class="form-control" id="telephone" name="telephone"
                           placeholder="Enter telephone number">
                </div>
            </div>
            @foreach ($fields as $item)
                @if($item->type == 'text')

                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label for={{ $item->slug }}>{{ $item->title }}</label>
                            <input type="text" class="form-control" id="{{$item->slug}}" name="{{$item->slug}}">
                        </div>

                    </div>
                @endif
                @if($item->type == 'checkbox')
                    <br>
                    <br>
                    <div class="checkbox">
                        {{$item->title}}
                        <br>
                        <br>
                        <?php $value_array = explode(', ', $item->values) ?>

                        @foreach($value_array as $value)
                            <label> {{Form::checkbox($item->slug, $value, false) }}   {{$value}} </label>
                            <br>
                        @endforeach
                    </div>
                @endif
                @if ($item->type == 'textbox')

                    <div class="form-group">
                        <label for="{{$item->slug}}">{{$item->title}}</label>
                        <textarea class="form-control" rows="5" id="{{$item->slug}}" name="{{$item->slug}}"></textarea>
                    </div>
                @endif
                @if ($item->type == 'select')
                    <div class="form-group">
                        <label for="{{$item->slug}}">{{$item->title}}</label><br>
                        <select name="{{$item->slug}}">
                            <?php $value_array = explode(', ', $item->values) ?>
                            @foreach($value_array as $value)
                                <option>{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

            @endforeach


            <button type="submit" class="btn btn-default">Submit</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
</body>
</html>
