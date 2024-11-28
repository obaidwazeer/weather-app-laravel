<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <style>
    body {
        margin-bottom: 60px;
        /* Height of the footer */
    }

    .footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 60px;
        /* Height of the footer */
        background-color: #f5f5f5;
    }

    p.card-text {
        margin-top: -10px;
    }
    </style>
</head>

<body>
    {{-- {{print_r($data)}} --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Weather App</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5 mb-4">Weather Application</h1>
        <div class="input-group mb-3">
            <form action="{{route('weather')}}" method="post" class="form-inline">
                @csrf
                <div class="d-flex">
                    <div class="form-group">
                        <select class="form-select" name="city" id="city">
                            <option value="-1">-- Select City --</option>
                            <option value="karachi">Karachi</option>
                            <option value="lahore">Lahore</option>
                            <option value="faisalabad">Faisalabad</option>
                            <option value="rawalpindi">Rawalpindi</option>
                            <option value="gujranwala">Gujranwala</option>
                            <option value="peshawar">Peshawar</option>
                            <option value="multan">Multan</option>
                            <option value="islamabad">Islamabad</option>
                            <option value="quetta">Quetta</option>
                        </select>
                    </div>
                    <button style="margin-left: 20px;" class="btn btn-primary">Search</button>
                </div>
            </form>

        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Looks Like</h5>
                        <br>
                        @if (isset($data['weather'][0]['icon']))
                            {{-- {{$data['weather']['icon']}} --}}
                            <img src="https://openweathermap.org/img/wn/{{$data['weather'][0]['icon']}}@2x.png">
                        @else
                            <b>--</b>
                        @endif
                        <br>
                        @if (isset($data['weather'][0]['description']))
                            {{$data['weather'][0]['description']}}
                        @else
                            <b>--</b>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Location Details</h5>
                        <br>
                        <p class="card-text">Country: @if (isset($data['sys']['country']))
                            {{$data['sys']['country']}}
                        @else
                            <b>--</b>
                        @endif</p>
                        <p class="card-text">Name: @if (isset($data['name']))
                            {{$data['name']}}
                        @else
                            <b>--</b>
                        @endif</p>
                        <p class="card-text">Latitude: @if (isset($data['coord']['lat']))
                            {{$data['coord']['lat']}}
                        @else
                            <b>--</b>
                        @endif</p>
                        <p class="card-text">Longitude: @if (isset($data['coord']['lon']))
                            {{$data['coord']['lon']}}
                        @else
                            <b>--</b>
                        @endif</p>
                        <p class="card-text">Sunrise: @if (isset($data['sys']['sunrise']))
                            {{$data['sys']['country']}}
                        @else
                            <b>--</b>
                        @endif</p>
                        <p class="card-text">Sunset: @if (isset($data['sys']['sunset']))
                            {{$data['sys']['sunset']}}
                        @else
                            <b>--</b>
                        @endif</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Temperature &deg; C | &deg; F</h5>
                        <br>
                        <p class="card-text">Temp: @if (isset($data['main']['temp']))
                            {{$data['main']['temp']}}
                        @else
                            <b>--</b>
                        @endif</p>
                        <p class="card-text">Min Temp: @if (isset($data['main']['temp_min']))
                            {{$data['main']['temp_min']}}
                        @else
                            <b>--</b>
                        @endif</p>
                        <p class="card-text">Max Temp: @if (isset($data['main']['temp_max']))
                            {{$data['main']['temp_max']}}
                        @else
                            <b>--</b>
                        @endif</p>
                        <p class="card-text">Feels Like: @if (isset($data['main']['feels_like']))
                            {{$data['main']['feels_like']}}
                        @else
                            <b>--</b>
                        @endif</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Precipitation &percnt;</h5>
                        <br>
                        <p class="card-text">Humidity: @if (isset($data['main']['humidity']))
                            {{$data['main']['humidity']}}
                        @else
                            <b>--</b>
                        @endif</p>
                        <p class="card-text">Pressure: @if (isset($data['main']['pressure']))
                            {{$data['main']['pressure']}}
                        @else
                            <b>--</b>
                        @endif</p>
                        <p class="card-text">Sea Level: @if (isset($data['main']['sea_level']))
                            {{$data['main']['sea_level']}}
                        @else
                            <b>--</b>
                        @endif</p>
                        <p class="card-text">Ground Level: @if (isset($data['main']['grnd_level']))
                            {{$data['main']['grnd_level']}}
                        @else
                            <b>--</b>
                        @endif</p>
                        <p class="card-text">Visibility: @if (isset($data['visibility']))
                            {{$data['visibility']}}
                        @else
                            <b>--</b>
                        @endif</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Wind m/h</h5>
                        <br>
                        <p class="card-text">Speed: @if (isset($data['wind']['speed']))
                            {{$data['wind']['speed']}}
                        @else
                            <b>--</b>
                        @endif</p>
                        <p class="card-text">Degree: @if (isset($data['wind']['deg']))
                            {{$data['wind']['deg']}}
                        @else
                            <b>--</b>
                        @endif</p>
                        <p class="card-text">Gust: @if (isset($data['wind']['gust']))
                            {{$data['wind']['gust']}}
                        @else
                            <b>--</b>
                        @endif</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br><br>
    <footer class="footer">
        <div class="container">
            <span class="text-muted">© 2024 Weather App. All rights reserved.</span>
        </div>
    </footer>
</body>

</html>
