<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buckets</title>
</head>

<body>
    <div class="container">
        <div style="text-align:center;background:rgb(0, 0, 0);color:#fff">
            <h1>Inputs</h1>
        </div>

        <div>
            <h2>Bucket values</h2><br>
            <ul style="list-style:none">
                @foreach ($buckets as $key => $bucket)
                    <li style="display:flex;align-items:center;justify-content:space-between"><span>
                            {{ $key }} : {{ $bucket['max'] }} of max volume </span>
                    </li>
                @endforeach
                <br>
            </ul>
        </div>
        <div>
            <h2>Balls values</h2><br>
            <ul style="list-style:none">
                @foreach ($balls as $key => $ball)
                    <li style="display:flex;align-items:center;justify-content:space-between"><span>
                            {{ $key }} : {{ $ball }} of volume</span>
                    </li>
                @endforeach
                <br>
            </ul>
        </div>
        @if (!is_null($current_suggestion))
            <div>
                <h2>Suggestion made</h2><br>
                <ul style="list-style:none">
                    @foreach ($current_suggestion["suggestion"] as $key => $ball)
                        <li style="display:flex;align-items:center;justify-content:space-between"><span>
                                {{ $key }} : {{ $ball }} has been suggested</span>
                        </li>
                    @endforeach
                    <br>
                </ul>
                <h2>Results</h2><br>
                <ul style="list-style:none">
                    @foreach ($current_suggestion["results"] as $key => $bucket)
                        <li style="display:flex;align-items:center;justify-content:space-between"><span>
                                Bucket {{ $key }} :
                                <ul>
                                    @foreach ($bucket as $insideBucket)
                                        <li>Place {{ $insideBucket["value"] }} {{ $insideBucket["key"] }}</span></li>
                                    @endforeach
                                </ul>
                        </li>
                    @endforeach
                    <br>
                </ul>
                <!--a href="/validate" type="button">Validate suggestion</a-->
                <a href="/new" type="button">Make other suggestion</a>
            </div>
        @else
            <form action="/suggest" method="post" style="display:flex;justify-content:space-evenly">
                @csrf
                <div>
                    <h2>Make suggestion</h2><br>
                    <ul style="list-style:none">
                        <li style="display:flex;align-items:center;justify-content:space-between"><span> A: Pink:
                            </span>
                            <input type="number" name="Pink" style="width:60px;margin:0  5px" value="0" />
                            <p> Balls </p>
                        </li>
                        <li style="display:flex;align-items:center;justify-content:space-between"><span> B: Red: </span>
                            <input type="number" name="Red" style="width:60px;margin:0  5px" value="0" />
                            <p> Balls </p>
                        </li>
                        <li style="display:flex;align-items:center;justify-content:space-between"><span> C: Blue:
                            </span>
                            <input type="number" name="Blue" style="width:60px;margin:0  5px" value="0" />
                            <p> Balls </p>
                        </li>
                        <li style="display:flex;align-items:center;justify-content:space-between"><span> D: Orange:
                            </span>
                            <input type="number" name="Orange" style="width:60px;margin:0  5px" value="0" />
                            <p> Balls </p>
                        </li>
                        <li style="display:flex;align-items:center;justify-content:space-between"><span> E: Green:
                            </span>
                            <input type="number" name="Green" style="width:60px;margin:0  5px" value="0" />
                            <p> Balls </p>
                    </ul>
                </div>
                </li>
                <li style="display:flex;align-items:center;justify-content:space-between">
                    <button style="height: 30px; text-align:end;background;border:1px solid black;margin-top: 10px;"
                        type="submit" name="=balls" class="btn btn-default">Suggest</button>
                </li>
            </form>
        @endif
    </div>
    </div>
</body>

</html>
