<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8' />
    <title>Game Of Life</title>
    <script type='text/javascript' src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type='text/javascript' src="gof.js"></script>
    <link href="style.css" media="all" rel="stylesheet" />
</head>
<body>
    <h1>Game of Life</h1>
    <div>
        <form action='' method='post'>
            <label>Number of Generations:
                <input type='' name='generations' value='200' />
            </label>
            <label>Interval in miliseconds:
                <input type='' name='interval' value='10' />
            </label>
            <br />
            <label>Rows:
                <input type='' name='rows' value='20' />
            </label>
            <label>Columns:
                <input type='' name='columns' value='30' />
            </label>
            <input type='submit' class='button' value='Play' name='' />
        </form>
    </div>

    <div class='clear'></div>

    <div id='board'>
        <div class='row'>
            <div class='cell'></div>
            <div class='cell alive'></div>
            <div class='cell'></div>
            <div class='cell alive'></div>
        </div>
        <div class='row'>
            <div class='cell alive'></div>
            <div class='cell alive'></div>
            <div class='cell'></div>
            <div class='cell alive'></div>
        </div>
        <div class='row'>
            <div class='cell'></div>
            <div class='cell alive'></div>
            <div class='cell'></div>
            <div class='cell alive'></div>
        </div>
        <div class='row'>
            <div class='cell'></div>
            <div class='cell'></div>
            <div class='cell'></div>
            <div class='cell'></div>
        </div>
    </div>

    <div class='clear'></div>

    <div id='log'></div>

</body>
</html>
