# [ROI System](https://roi.femglobalb.com.br/storage/settings/CWQbOUW16TTy0ofdE16bKRqHEOi9SwwuWPdkDPWu.png/)

A finalidade deste projeto é fazer uma integração entre as plataformas do google ad manager e facebook ads, a fim de gerar relatórios de ROI, usando os valores gastos em anúncio no facebook e retornos no google ad manager, tornando assim a fácil a visualização de roi, sem a necessidade de gastar horas organizando e craiando planilhas para ver esse dados.

## 🚀 Começando
Antes de começar certifique de ter o PHP com versão 8 ou superior, Redis coma versão 7.0 ou mais.

## 📋 Pré-requisitos
- PHP Versão 8 ou mais
- Redis versão 7.0 ou mais

## 🔧 Instalação
 - Primeiro passo é baixar o projeto fazendo dawnload do arquivo zip, ou usando o comando abaixo:
 ```
   git clone https://github.com/rafaeldevfem/roi-system.git
 ```

 - Depois do projeo ter sido clonado naveque até o diretório criado e instale as dependências:
 ```
   composer install
 ```

- Copiar o arquivo '.env.exemplo' e renomear para '.env' e alterar os valores da váriaveis de ambiente.

- Gerar um chave para a aplicação:
 ```
   php artisan key:generate
 ```

- Rodar as migrations:
   - Comando seeder: Este comando irá gerar as migrations com dados pré definidos.
    ```
      php artisan migrete --seed
    ```

   - Comando normal: Este comando irá apenas gerar as migrations sem  enhum dado.
    ```
      php artisan migrete
    ```

 - Rodar aplicação usando servidor interno do php:
 ```
   php artisan serve
 ```

- Rodar Redis (Certifique de ter o mesmo instalado em sua máquina)
 ```
   redis-server
 ```

- Rodar Horizon responssável por gerenciar as filas de processos (Necessário iniciar primeiramente o Redis)
 ```
   php artisan horizon
 ```

- Caso quira rodar o schedules para o ambiente de desenvolvimento
 ```
   php artisan schedule:work
 ```

- OBSS: Usando o camando seeder, irá gerar um usuário inicial
   - User: admin@admin.com
   - Pass: admin1234
 
## 🖇 Dependências
- bensampo/laravel-enum       => 6.0 ou mais
- facebook/php-business-sdk   => 14.0 ou mais
- googleads/googleads-php-lib => 57.0 ou mais
- guzzlehttp/guzzle           => 7.2 ou mais
- laravel/framework           => 9.19 ou mais
- laravel/horizon             => 5.10 ou mais
- laravel/sanctum             => 3.0 ou mais
- laravel/socialite           => 5.5 ou mais
- laravel/tinker              => 2.7 ou mais
- tinymce/tinymce             => 6.1 ou mais

## 🖇 Dependências de desenvolvimento
- fakerphp/faker          => 1.9.1 ou mais
- laravel/pint            => 1.0 ou mais
- laravel/sail            => 1.0.1 ou mais
- mockery/mockery         => 1.4.4 ou mais
- nunomaduro/collision    => 6.1 ou mais
- phpunit/phpunit         => 9.5.10 ou mais
- spatie/laravel-ignition => 1.0 ou mais
- axios                   => 0.27 ou mais
- laravel-vite-plugin     => 0.5.0 ou mais
- lodash                  => 4.17.19 ou mais
- postcss                 => 8.1.14 ou mais
- vite                    => 3.0.0 ou mais
- laravel-mix             => 6.0.49 ou mais
- resolve-url-loader      => 5.0.0 ou mais
- sass                    => 1.52.3 ou mais
- sass-loader             => 12.1.0 ou mais
- webpack                 => 5.73.0 ou mais
- webpack-cli             => 4.10.0 ou mais
- bootstrap               => 5.2.0 ou mais
- bootstrap-icons         => 1.9.1 ou mais
- jquery                  => 3.6.0 ou mais

## 📦 Produção
Depois de feito deploy da aplicação:
- Acessar o servidor via ssh e instalar as dependências
- E adicionar um arquivo .env com as váriaveis necessárias


## 🛠️ Construído com
* [HTML](https://html.com/) - Linguagem de marcação
* [PHP](https://www.php.net/docs.php) - Lingugem
* [Laravel](https://laravel.com/docs) - Framework
* [CSS](#) - Estilização
* [Git](https://git-scm.com/doc) - Gerenciador de versão

## ✒️ Autores
* **Rafael Vieira** - *Trabalho Inicial* 
    - [Github Público](https://github.com/rafaeldevcode) 
    - [Github Privado](https://github.com/rafaeldevfem) 

## 📄 Licença
Este projeto está sob a licença (MIT) - veja o arquivo [LICENSE.md](https://github.com/rafaeldevfem/roi-system/blob/main/LICENCE.md) para detalhes.

## 🎁 Expressões de gratidão
* Conte a outras pessoas sobre este projeto 📢
* Obrigado publicamente 🤓.

## 🔗 Links úteis
- [Documentação PHP](https://www.php.net/docs.php)
- [Laravel](https://laravel.com/docs)
- [Laravel Horizon](https://laravel.com/docs/9.x/horizon)
- [Laravel Supervisor](https://laravel.com/docs/9.x/horizon#supervisors)
- [Bootstrap](https://getbootstrap.com/docs/5.1/getting-started/introduction/)
- [Jquery](https://api.jquery.com/)
- [SASS](https://sass-lang.com/documentation/)
- [TineMce](https://www.tiny.cloud/docs/tinymce/6/)
- [Webpack](https://webpack.js.org/concepts/)
- [Laravel Enum](https://github.com/BenSampo/laravel-enum)
- [Laravel Socialite](https://laravel.com/docs/9.x/socialite)
- [Facebook SDK](https://developers.facebook.com/docs/)
- [Google SDK](https://developers.google.com/ad-manager/api/start)

---
⌨️ com ❤️ por [Rafael Vieira](https://github.com/rafaeldevcode) 😊
