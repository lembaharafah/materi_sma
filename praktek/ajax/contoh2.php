<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>data demo</title>
    <style>
        div {
            margin: 5px;
            background: yellow;
        }

        button {
            margin: 5px;
            font-size: 14px;
        }

        p {
            margin: 5px;
            color: blue;
        }

        span {
            color: red;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>

<body>

    <div>A div</div>
    <button>Get "blah" from the div</button>
    <button>Set "blah" to "hello"</button>
    <button>Set "blah" to 86</button>
    <button>Remove "blah" from the div</button>
    <p>The "blah" value of this div is <span>?</span></p>

    <script>
        $("button").on("click", function() {
            var value;

            switch ($("button").index(this)) {
                case 0:
                    value = $("div").data("blah");
                    break;
                case 1:
                    $("div").data("blah", "hello");
                    value = "Stored!";
                    break;
                case 2:
                    $("div").data("blah", 86);
                    value = "Stored!";
                    break;
                case 3:
                    $("div").removeData("blah");
                    value = "Removed!";
                    break;
            }

            $("span").text("" + value);
        });
    </script>

</body>

</html>