<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Demo</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">

        <h3>Hello, <?php echo $name; ?>!</h3>
        <!-- Curly braces echo things -->
        <h3>Hello, {{$name}}!</h3>
        <hr />

        <h3>Value of null : <?php echo $nullVar; ?></h3>
        <h3>
            Value of null :
            <?php
                if ($nullVar == null)
                    echo "this is null";
                else
                    echo $nullVar;
            ?>
        </h3>
        <!-- Use 'or' shortcut to save space and time -->
        <h3>Value of null : {{$nullVar or "the value is null"}}</h3>
        <hr />

        <h3>
            <?php
                foreach ([1,2,3,4,5] as $i) {
                    echo $i.", ";
                }
            ?>
        </h3>
        <h3>
            <!-- Blade style foreach -->
            @foreach([1,2,3,4,5] as $i)
                <span class="label label-success">{{$i}}</span>
            @endforeach
        </h3>

        <hr />
        <h3>
            <?php
                if (count($name) % 2 == 0)
                    echo "Your name has even characters.";
                else
                    echo "Your name has odd characters.";
            ?>
        </h3>
        <h3>
            <!-- Blade style if -->
            @if(count($name) % 2 == 0)
                Your name has even characters
            @else
                Your name has odd characters
            @endif
        </h3>
    </div>
</body>
</html>