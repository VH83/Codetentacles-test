<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('meta_tags')
    <title>@yield('title') | Codetentacles</title>
    <meta name="description" content="@yield('description')">  
    @vite('resources/css/app.css')

    @stack('header_scripts')

    @vite('resources/js/app.js')

    @yield('structure_tag')

</head>
<body class="">
    <header class="" id="header">
       
    </header>
    
    
    <main>
        
        <!-- Content yield -->
        <div>
            @yield('content')
        </div>
    </main>

    <footer>
        
    </footer> 

    @stack('logic_scripts')
</body>
</html>