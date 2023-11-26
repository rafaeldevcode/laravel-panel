<form action='?' method='POST' class='input-group'>
    <input type='search' class='py-1 px-2 rounded-l border border-divide-gray-500 mr-[-5px] focus:outline-none focus:border-color-main focus:ring-color-main focus:ring-1' name='search' placeholder='Pesquisar...' value='{{ $value }}' {{ $attributes }}>

    <button title="Submeter pesquisa" type='submit' class='input-group-text py-1 px-2 btn-primary rounded-r' id='search'>
        <i class='bi bi-search fs-xs'></i>
    </button>
</form>
