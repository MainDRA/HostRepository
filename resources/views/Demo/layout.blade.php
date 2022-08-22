<!DOCTYPE html>
<html>

<head>
    <title>Repository</title>

    <!-- Title logo -->
    <link rel="shortcut icon" href="https://dra.gov.bt/wp-content/themes/dratheme/images/favicon.ico">

    <!-- Bootsrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fonts awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL ('css/style.css')}}">

    <!-- MDB-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css"
        integrity="sha512-YE4ntZgHu6nnEp3CzcxwP07khLufHMwLthDhSd4SJQI2xhsdWjjjpCY7wF8e0eKhdGO6i0o1YVxZd6f1z4zN+Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"
        integrity="sha512-Wq5ip5NUbm4Ka2BqR/KkJIJdRFQAdpVluNIENMHHPJysUkBtIR1MmqKu2tfPZvuJdm4q5/KQDgqLSR6BL23pFw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Bootstrap-select -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

    <!-- Country -->
    <link rel="stylesheet" href="//unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css"
        type="text/css" />
    <script src="//unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script>

    <!-- Pie chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.js"
        integrity="sha512-Lii3WMtgA0C0qmmkdCpsG0Gjr6M0ajRyQRQSbTF6BsrVh/nhZdHpVZ76iMIPvQwz1eoXC3DmAg9K51qT5/dEVg=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

</head>

<body>

    <div class="container">

        <div class="row justify-content-start">
            <div class="col-md-6 my-2">
                <a href="{{URL('/')}}">
                    <img src="https://www.linkpicture.com/q/Header3.png" alt="Header" height="200">
                </a>
            </div>
        </div>

    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mx-2 nav-header">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-letter">
                    <li class="nav-item mx-3">
                        <a class="nav-link" aria-current="page" href="{{URL('/')}}">Home</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Management
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{URL('/add_create')}}">Add</a></li>
                    
                        </ul>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="{{URL('/dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            List of drugs
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{URL('/listofdrugs')}}">Valid</a></li>
                            <li><a class="dropdown-item" href="{{URL('/listofdrugs/expiry')}}">Expire</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    


    <div class="container-fluid mt-3">
        @yield('content')
    </div>


    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <span class="text-muted">© 2022 Drug Regulatory Authority</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="https://dra.gov.bt/"><i class="fa-solid fa-globe fa-lg"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="https://www.youtube.com/channel/UCxDkgVz5PytKpWFFMCNFrDg"><i class="fa-brands fa-youtube fa-lg"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/DRABhutan"><i class="fa-brands fa-facebook fa-lg"></i></a></li>
            </ul>
        </footer>
    </div>


    <script type="text/javascript">
        // Country selector
        $('.countrypicker').countrypicker();

    </script>

</body>

</html>
