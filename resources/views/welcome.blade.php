<!DOCTYPE html>
<html>
    <head>
        <title>Input In Container Fixed To Bottom Of Viewport | datetimepicker Tests</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="{{ asset('js/jquery/jquery.datetimepicker.css')}}"/>

     <link rel="stylesheet" type="text/css" href="{{ asset('node_modules/jimp')}}"/>


    </head>

    <body>
        <main>
            <h1>Input In Container Fixed To Bottom Of Viewport</h1>

            <div id="filters">
                <form method="post" action="?">
                    <div>
                        <label for="filter-date">Date</label>
                        <input type="text" name="filter-date" id="filter-date"/>
                    </div>

                    <div>
                        <input type="submit" value="Filter"/>
                    </div>
                </form>
            </div>

        </main>


        <script src="{{ asset('js/jquery/jquery.js')}}"></script>
        <script src="{{ asset('js/jquery/jquery.datetimepicker.full.js')}}"></script>

          <script src="{{ asset('/js/image/resice.js') }}"></script>
        <script>
            /*jslint browser:true*/
            /*global jQuery, document*/

            jQuery(document).ready(function () {
                'use strict';

                jQuery('#filter-date, #search-from-date, #search-to-date').datetimepicker();
            });
        </script>
    </body>
</html>
