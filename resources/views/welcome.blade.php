<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
        <link rel="stylesheet" href="css/app.css">

        <title>Beer Fridge</title>

    </head>
    <body>
        <div id="app">

            <div class="menu pure-menu pure-menu-horizontal">
                <a class="pure-menu-heading" href="#">Beer Requests</a>

                <ul class="pure-menu-list">
                    <ul><a href="#request" class="pure-menu-link">Request a Beer</a></ul>
                </ul>

            </div>

            <div class="content">
                <router-view></router-view>
            </div>

        </div>

        <script src="/js/app.js"></script>

    </body>
</html>
