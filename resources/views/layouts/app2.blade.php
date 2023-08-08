
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Admin - Dashboard HTML Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <!-- Styles -->
    <!-- link href="{{ asset('css/app.css') }}" rel="stylesheet" -->

     <!-- https://fonts.google.com/specimen/Open+Sans -->
     <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}" />
     <!-- https://fontawesome.com/ -->
     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
     <!-- https://getbootstrap.com/ -->
     <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">
     <!--
     Product Admin CSS Template
     https://templatemo.com/tm-524-product-admin
     -->
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                
                    <h1 class="tm-site-title mb-0">Sistema Backup</h1>
               
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('/painel')}}">
                                <i class="fas fa-tachometer-alt"></i>
                                Painel
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-file-alt"></i>
                                <span>
                                    Cadastros <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/painelBanco')}}">Banco de dados</a>
                                <a class="dropdown-item" href="{{ url('/register')}}">Usuários</a>
                            </div>
                        </li>
                        <!--li class="nav-item">
                            <a class="nav-link" href="products.html">
                                <i class="fas fa-shopping-cart"></i>
                                Products
                            </a>
                        </li -->

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                <span>
                                    Backups <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/download/1')}}">Downloads MySQL</a>
                                <a class="dropdown-item" href="{{ url('/download/2')}}">Downloads SQLServer</a>
                            </div>
                        </li>

                        
                        <!-- li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-user"></i>
                                <span>
                                    Settings <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Billing</a>
                                <a class="dropdown-item" href="#">Customize</a>
                            </div>
                        </li -->
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                              <div style="float: left;">{{ @Auth::user()->name }}</div>            
                              <div style="float: left; margin-left: 25px; margin-top:2px; font-size:13px; color:gold">:: {{ __('Logout') }} ::</div>
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
        
        @hasSection ('content')
        @yield('content')
        @endif

    </div>
    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
            <p class="text-center text-white mb-0 px-4 small">
                Copyright &copy; <b>2023</b> All rights reserved.

                Design: <a rel="nofollow noopener" href="#" class="tm-footer-link">CTCEA</a>
            </p>
        </div>
    </footer>
    </div>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <!-- https://jquery.com/download/ -->
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <!-- https://momentjs.com/ -->
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="{{ asset('js/tooplate-scripts.js') }}"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>
</body>

</html>
