<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='{{ asset('/assets/css/style.css') }}' />
        <link rel='stylesheet' href='{{ asset('/assets/css/globals.css') }}' />
        <meta name='author' content='Rafael Vieira | github.com/rafaeldevcode' />
        <x-favicon />

        <title>@yield('title')</title>
    </head>

    <body class="antialiased">
        <main class='vw-100 vh-100 d-flex justify-content-center align-items-center custom-@yield('code')'>
            <div class='container d-flex flex-column justify-content-center align-items-center border rounded border-@yield('type') m-2 custom-@yield('code')-mirror'>
                <ul class='d-flex flex-nowrap text-@yield('type')'>
                    <li class='fw-bolder display-6'>@yield('code')</li>
                    <li class='display-6 mx-4'>|</li>
                    <li class='display-6'>@yield('message')</li>
                </ul>

                <button id='back' class='btn btn-@yield('type') text-light'>Voltar</button>
            </div>
        </main>
    </body>
</html>

<script type="text/javascript" src="{{ asset('/libs/jquery/jquery.js') }}"></script>
<script type="text/javascript">
    $(document).ready(()=>{
        pageBack();
    });

    // Voltar para a página anterior
    function pageBack(){
        const pageBack = $('#back');

        if(pageBack){
            pageBack.click((event)=>{
                event.preventDefault();

                history.back();
            });
        }
    }
</script>
