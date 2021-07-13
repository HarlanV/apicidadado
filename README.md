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


### INSTALAÇÃO
Para a instalação deste projeto utilizaremos o composer como gerenciador de dependencias, facilitando assim o trabalho. Depois de baixado e extraído o projeto, abra o seu cmd dentro da pasta raiz do projeto. Aqui nós vamos utilizar o composer para instalar. Use o seguinte comando:

> composer install

### CONFIGURAÇÃO
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

### PREPARANDO OS BD
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


## UTILIZAÇÃO

### Requisitos cidadão. 
Para as etapas de inserção e alteração de dados precisaremos preencher dados como cpf, email, etc. Para isso, as regras definias a baixo são válidas para todos os casos.

    {nome} => Minimo de 2 caracteres,
    {sobrenome} => Sem requisitos,
    {cpf} => Não deve ser um valor repetido,
    {email} => Não deve ser um valor repetido,
    {celular} => Maximo de 12 caracteres minimo de 9 caracteres,
    {cep} => Exatos 8 caracteres,

Sempre que um dos campos acima for citado, os parametros devem ser preechidos conforme orientados acima.
### Utilização via linha de comando (cmd)

Podemos inserir um cidadão diretamente via linha de comando. A inserção pode ser feita de duas maneiras: de maneira dinâmica, onde os campos vão sendo inseridos por vários inputs ou de forma rápida, feito através de um único input de estrutura pré-definida.

Os comandos podem ser vistos na listagem geral, a qual temos acesso digitando simplemente
> php artisan

As vias de inserção devem aparecer disponíveis agrupadas sob "cidadao"

#### Inserção via cmd dinamicamente:





