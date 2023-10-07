<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='{{ asset('/libs/tailwind/style.css') }}' />
        <link rel='stylesheet' href='{{ asset('/assets/css/globals.css') }}' />
        <meta name='author' content='Rafael Vieira | github.com/rafaeldevcode' />
        <x-favicon />

        <x-meta-config :title="@yield('title')" />
    </head>

    <body class="antialiased">
        <main class='w-screen h-screen flex justify-center items-center custom-@yield('code')'>
            <div class='container flex flex-col justify-center items-center border rounded border-danger m-2 custom-@yield('code')-mirror'>
                <ul class='flex flex-nowrap text-danger'>
                    <li class='font-bold text-4xl'>@yield('code')</li>
                    <li class='text-4xl mx-4'>|</li>
                    <li class='text-4xl'>@yield('message')</li>
                </ul>

                <button id='back' class='mt-4 btn btn-danger text-light'>Voltar</button>
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
