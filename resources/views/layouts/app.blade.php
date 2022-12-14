<!DOCTYPE html>
<html lang="en">

<head>
  <title>Surveys</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <meta name="_token" content="{!! csrf_token() !!}" /> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/1b2cfc15df.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */


    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #183153;
      height: 100%;
    }

    /*  ul {
      color: white;
    } */

    .nav>li>a {
      color: white;
    }

    .row.content {
      height: 700px;
    }

    #list:hover {
      background-color: black;
    }

    a {
      cursor: pointer;
    }

    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {
        height: auto;
      }

    }
  </style>
  @stack('head')
</head>

<body>

  <nav class="navbar navbar-inverse visible-xs">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">

          <li><a id="list" href="#" style="">Surveys</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-3 sidenav hidden-xs" style="width: 20%;">
        <!-- <h2 style="color: #fff;">Admin</h2> -->
        <ul class="nav nav-pills nav-stacked">

          <li><a href="">Surveys</a>
            <ul>
              <!-- <li> -->
              <button onclick="location.href='{{route('survey.questions',request()->route('id'))}}'">
                Start</button>
              <!-- </li> -->
              @if($submissions==true)
              <button onclick="location.href='{{route('survey.view',request()->route('id'))}}'" style="cursor: pointer;">
                View
              </button>
              @else
              <button disabled>View</button>
              @endif
            </ul>
          </li>

        </ul><br>
      </div>

      <br>

      <div class="col-sm-9" style="width: 80%;">
        <form action="{{route('signout')}}" method="post">
          @csrf
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <div class="well" style="background-color:#fff;border: none">
            <button type="submit" name="submit" style="float: right;">
              <i class="fa-solid fa-right-from-bracket" style="float: right;">LOGOUT</i>
            </button>
          </div>
        </form>

        <div class="row" style="background-color: #e4e9f0;align-items: center;justify-content:center;display:flex;min-height: 600px;margin-left:20px;margin-right:10px">
          @yield('content')

        </div>

      </div>
    </div>
  </div>

</body>

</html>