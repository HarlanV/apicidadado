# DOCUMENTAÇÃO


## SOBRE O PROJETO
O projeto trata-se de uma API para armazenamento e manipulação de dados de cidadão. Trata-se de um projeto para fins acadêmicos e de portifólio, sem finalidade de implementação de caso real.

### FRAMEWORK UTILIZADO
O projeto se utilizou da ferramenta Laravel como framework principal. A escolha deste framwork foi devido principalmente devido a alta aceitação de mercado apesar de sua gratuidade. Além disso, pode ser contado com uma comunidade ativa para resolução de problemas e atualização posterior. 

### FERRAMENTAS DE PRÉ-REQUISTO
Para podermos iniciar a instalação do projeto, é necessário ter as seguintes ferramentas já instaladas:

1 - PHP 7 ou superiror

2 - COMPOSER

Além disso, é necessário uma conexão com banco de dados já devidamente configurado. 
## INSTALAÇÃO


### DOWNLOAD


### Instalação
Para a instalação deste projeto utilizaremos o composer como gerenciador de dependencias, facilitando assim o trabalho. Depois de baixado e extraído o projeto, abra o seu cmd dentro da pasta raiz do projeto. Aqui nós vamos utilizar o composer para instalar. Use o seguinte comando:

> composer install

### Configuração
Instalado o projeto, abra seu arquivo de variáveis de ambiente(.env) que deve estar na pasta raiz.
Caso o arquivo não tenha sido criado/importado, você terá um outro arquivo de exemplo (.env.example). Faça uma copia do arquivo e renomeie-o para ".env".

Já com o arquivo correto aberto, você deve agora configurar seu ambiente de trabalho.
Procure as variáveis de banco de dados e configure-as substituindo os valores pelos do seu ambiente de trabalho.


DB_CONNECTION={Qual seu BD}
DB_HOST={endereço host do BF}
DB_PORT= {porta de acesso do BD}
DB_DATABASE={BD a ser utilizado}
DB_USERNAME=root{nome do usuario do BD}
DB_PASSWORD={senha do usuario}

Além das configurações do banco, aqui deve ser configurado também sua URL de acesso. Por Padrão é utilizada o Localhost com a porta 8000. Caso seja necessário trocar a porta de acesso, será mostrado mais a baixo na utilização.

### Preparando o BD
Após configurado sua aplicação, é necessário agora preparar o BD com as tabelas necessárias. Neste caso, nós utilizaremos o Eloquent para executar as migrations já preparadas. Após isso, iremos inserir um caso de exemplo (esta etápa é optativa).

Para preparar o BD execute o comando
> php artisan migrate

Para inserir um cidadão de exemplo (opcional) utilize
> php artisan db:seed

### Servindo a aplicação
Para servir a aplicação rodamos o comando
> php artisan serve

Caso se deseje especificar a porta de acesso, utilizamos no lugar do comando acima o seguinte:
> php artisan serve --port=8080

Assim que a aplicação estiver disponível, a seguinte mensagem deve ser exibida no seu cmd

"PHP 7.4.3 Development Server (http://127.0.0.1:8000) started"

Pronto, sua aplicação está funcionando.



## Requisitos dos campos de Cidadão
Para as etapas de inserção e alteração de dados precisaremos preencher dados como cpf, email, etc. Para isso, as regras definias a baixo são válidas para todos os casos.

    {nome} => Minimo de 2 caracteres,
    {sobrenome} => Sem requisitos,
    {cpf} => Não deve ser um valor repetido,
    {email} => Não deve ser um valor repetido,
    {celular} => Maximo de 12 caracteres minimo de 9 caracteres,
    {cep} => Exatos 8 caracteres,

Os campos de texto devem vir sempre entre aspas. Por exemplo, no campo nome poderiamos colocar "Harlan Victor".
Sempre que um dos campos acima for citado, os parametros devem ser preechidos conforme orientados acima.
## Insert via linha de comando (cmd)

Podemos inserir um cidadão diretamente via linha de comando. A inserção pode ser feita de duas maneiras: de maneira dinâmica, onde os campos vão sendo inseridos por vários inputs ou de forma rápida, feito através de um único input de estrutura pré-definida.

Os comandos podem ser vistos na listagem geral, à qual temos acesso digitando simplemente
> php artisan

As vias de inserção devem aparecer disponíveis agrupadas sob "cidadao"

#### Insert via cmd dinamicamente:

> cidadao:create-asking

#### Insert via comando único (modo "rápido")

> cidadao:create-fast {nome} {sobrenome} {cpf} {email} {celular} {cep}

Os campos devem vir inseridos entre aspas e separados por um espaço, conforme acima.

## Rotas da API

* A API não foi pensada como tendo sistema de autenticação. Ou seja, não se faz necessário a configuração Token.

* Os conteúdos são referentes aos dados que devem ser enviados, devem estar no corpo da requisição e no formato JSON.

* As respostas devolvidas também estão em JSON

* Os métodos são referentes aos verbos http que devem ser utilizados para aquela requisição específica.

* Os campos descritos como BASE_URL são referentes ao endereço de url configurado no seu ambiente. Ex.: localhost:8000

### Criar um novo Cidadão
* MÉTODO: POST

* URL: BASE_URL/api

* CONTEÚDO:
{
    "nome": "{nome}",
    "sobrenome": "{sobrenome}",
    "cpf": "{cpf}",
    "contatos": {
        "email": "{email}",
        "celular": "{celular}"
    },
        "cep": "{cep}"
}


### Listar todos os Cidadões
* MÉTODO: GET

* URL: BASE_URL/api


### Buscar um cidadão
* MÉTODO: GET

* URL: BASE_URL/api/{cpf}


### Editar um Cidadão
* MÉTODO: PUT

* URL: BASE_URL/api/{cpf}

* CONTEÚDO
{
    "nome": "{nome}",
    "sobrenome": "{sobrenome}",
    "cpf": "{cpf}",
}


### Remover Cidadão
* MÉTODO: DELETE

* URL: BASE_URL/api/{cpf}


### Consultar um Endereço
* MÉTODO: GET

* URL: BASE_URL/api/{cpf}/endereco


### Consultar um Contato
* MÉTODO: GET

* URL: BASE_URL/api/{cpf}/contato


### Editar um Endereço
* MÉTODO: PUT

* URL: BASE_URL/api/{cpf}

* CONTEÚDO
{
    "cep": "{cep}"
}


### Editar um Contato
* MÉTODO: PUT

* URL: BASE_URL/api/{cpf}

* CONTEÚDO
{
    "email": "{email}",
    "celular": "{celular}"
}















