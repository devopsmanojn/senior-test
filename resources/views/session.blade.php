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
        <div style="text-align:center;background:rgb(0, 0, 0);color:#fff"> <h1>Inputs</h1> </div>
            <form action="/start_session" method="post" style="display:flex;justify-content:space-evenly">
                @csrf
                <div>
                    <ul style="list-style:none">
                              <li style="display:flex;align-items:center;justify-content:space-between"><span> A  </span>
                        <input type="number" name="A" style="width:60px;margin:0  5px" value="0"/>
                        <p> cubic inches </p>
                        </li>
                        <li style="display:flex;align-items:center;justify-content:space-between"><span> B  </span>
                            <input type="number" name="B" style="width:60px;margin:0  5px" value="0"/>
                            <p> cubic inches </p>
                        </li>
                        <li style="display:flex;align-items:center;justify-content:space-between"><span> C  </span>
                            <input type="number" name="C" style="width:60px;margin:0  5px" value="0"/>
                            <p> cubic inches </p>
                        </li>
                        <li style="display:flex;align-items:center;justify-content:space-between"><span> D  </span>
                            <input type="number" name="D" style="width:60px;margin:0  5px" value="0"/>
                            <p> cubic inches </p>
                        </li>
                            <li style="display:flex;align-items:center;justify-content:space-between"><span> E  </span>
                            <input type="number" name="E" style="width:60px;margin:0  5px" value="0"/>
                            <p> cubic inches </p>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul style="list-style:none">
                        <li style="display:flex;align-items:center;justify-content:space-between"><span> A: Pink: </span>
                        <input type="number" name="Pink" style="width:60px;margin:0  5px" value="0"/>
                        <p> cubic inches </p>
                        </li>
                        <li style="display:flex;align-items:center;justify-content:space-between"><span> B: Red: </span>
                            <input type="number" name="Red" style="width:60px;margin:0  5px" value="0"/>
                            <p> cubic inches </p>
                        </li>
                        <li style="display:flex;align-items:center;justify-content:space-between"><span> C: Blue: </span>
                            <input type="number" name="Blue" style="width:60px;margin:0  5px" value="0"/>
                            <p> cubic inches </p>
                        </li>
                        <li style="display:flex;align-items:center;justify-content:space-between"><span> D: Orange: </span>
                            <input type="number" name="Orange" style="width:60px;margin:0  5px" value="0"/>
                            <p> cubic inches </p>
                        </li>
                            <li style="display:flex;align-items:center;justify-content:space-between"><span> E: Green:  </span>
                            <input type="number" name="Green" style="width:60px;margin:0  5px" value="0"/>
                            <p> cubic inches </p>
                        </li>

                    </ul>

                </div>
                <li style="display:flex;align-items:center;justify-content:space-between">
                    <button style="height: 30px; text-align:end;background;border:1px solid black;margin-top: 10px;" type="submit" name="sub" class="btn btn-default">Open session</button>
            </li>
            </form>
        </div>
    </div>
</body>
</html>
