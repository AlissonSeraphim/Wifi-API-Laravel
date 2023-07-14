# Projeto API de WiFi - Laravel

Este projeto é uma API desenvolvida em Laravel para gerar QR Codes de configuração de redes WiFi. A API possui dois métodos principais: GET, para obter o QR Code, e POST, para alterar os dados de usuário e senha.

## Funcionalidades

- **GET**: O método GET retorna um QR Code contendo as configurações de rede WiFi, com base nos dados armazenados na API. Esses dados são obtidos do arquivo `credentials.json`, que contém as informações de usuário e senha.

- **POST**: O método POST permite atualizar os dados de usuário e senha na API. Ao enviar uma requisição POST com os novos valores de usuário e senha, a API irá atualizar o arquivo `credentials.json` com as novas informações.

## Desafios Enfrentados

Durante o desenvolvimento deste projeto, foram encontrados alguns desafios e dificuldades, principalmente por se tratar do primeiro contato com o desenvolvimento de APIs em PHP e Laravel. Os principais desafios enfrentados foram:

1. **Gerenciamento de dependências**: Foram necessárias instalações e configurações do PHP, Composer e Laravel para que o projeto pudesse ser executado corretamente.

2. **Programação Orientada a Objetos (POO)**: Foi necessário adquirir conhecimentos básicos de POO para criar e modificar as classes e métodos do projeto.

3. **Deploy da API**: O processo de deploy da API em um servidor de hospedagem (Railway) foi uma tarefa nova e desafiadora, requerendo ajustes e configurações específicas para garantir o funcionamento correto da API no ambiente de produção.

4. **Tratamento de CORS e CSRF**: Foi necessário lidar com problemas de Cross-Origin Resource Sharing (CORS) e Cross-Site Request Forgery (CSRF), que inicialmente bloqueavam o método POST da API. Foram implementadas soluções como middlewares de CORS e CSRF para permitir o acesso adequado à API.

## Uso

A API pode ser acessada no seguinte endereço: [https://wifi-api-laravel-alisson.up.railway.app/wifi](https://wifi-api-laravel-alisson.up.railway.app/wifi).

Para testar os métodos POST e GET da API, você pode utilizar ferramentas como o [Thunder Client](https://www.thunderclient.io/) ou fazer requisições diretamente via cURL ou JavaScript.

## Estrutura do Projeto

- O arquivo `WifiController.php` em `app/Http/Controllers` contém a lógica do controle da API, incluindo os métodos para geração do QR Code e atualização dos dados de usuário e senha.

- O arquivo `credentials.json` em `storage/data` é utilizado para armazenar as informações de usuário e senha.

- O arquivo `api.php` em `/routes` contém as rotas da API, especificando os métodos e controladores correspondentes.

## Contribuições

Este projeto foi desenvolvido com o objetivo de aprendizado e demonstração.


## Contato

Em caso de dúvidas ou sugestões, você pode entrar em contato comigo através do email [seu-email@example.com](mailto:seu-email@example.com).

