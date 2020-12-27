<!DOCTYPE html>
<html>
    <head>
        <title>Input In Container Fixed To Bottom Of Viewport | datetimepicker Tests</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="{{ asset('js/jquery/jquery.datetimepicker.css')}}"/>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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


                <img  src="{{route('confe.image',[31]) }}" width="130px" height="120px" ><br>
      {{--   <button style="background-color:#3374FF;border: none;
  color: white;padding: 4px 8px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;"> --}}<a class="btn-primary" style="padding: 4px 8px;
  text-align: center;" href="{{route('conference.download',[31]) }}"> Descargr</a> {{-- Descargar</button> --}}


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
