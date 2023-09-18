<footer class='p-4 border-t shadow-lg'>
    <div class='flex flex-col lg:flex-row justify-between items-center'>
        <p class='font-bold text-secondary text-center'>&copy; @php echo date('Y') @endphp {{ $site_name }} | Todos os direitos reservados</p>

        <nav>
            <ul class='flex sm:flex-row flex-col m-0 p-0 items-center'>
                <li>
                    <a href='/policies/privacy' class='font-bold text-color-main'>
                        Politícas de Privacidade
                    </a>
                </li>
                <li class='mx-2 d-sm-block d-none'>|</li>
                <li>
                    <a href='/policies/terms' class='font-bold text-color-main'>
                        Temos de Uso
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</footer>
