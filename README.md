# ShopNow — Balanceador de Carga

## Sobre o projeto

Projeto acadêmico que simula um e-commerce chamado **ShopNow** durante a Black Friday, utilizando múltiplas instâncias de servidores e um balanceador de carga para distribuir as requisições.

O objetivo é demonstrar como o balanceamento de carga permite distribuir acessos entre diferentes servidores, melhorar a capacidade de atendimento e manter o sistema funcionando mesmo quando uma das instâncias fica indisponível.

## Tecnologias utilizadas

- PHP 8.4
- Apache
- Nginx
- Docker e Docker Compose
- Apache Benchmark (AB)

## Arquitetura

O projeto possui três instâncias independentes da aplicação PHP, executadas em contêineres Docker.

O Nginx atua como balanceador de carga, recebendo as requisições na porta `8080` e distribuindo-as entre os servidores.

**Estrutura da arquitetura:**

- Servidor 1 — aplicação PHP.
- Servidor 2 — aplicação PHP.
- Servidor 3 — aplicação PHP.
- Nginx — responsável pelo balanceamento de carga.

## Algoritmos implementados

O projeto implementa dois algoritmos de balanceamento:

- **Round Robin:** distribui as requisições sequencialmente entre os servidores disponíveis.
- **Least Connections:** direciona as requisições ao servidor com menos conexões ativas.

## Pré-requisitos

Antes de executar o projeto, é necessário possuir:

- Docker Desktop instalado.
- Docker Compose disponível.
- Docker Desktop iniciado e em execução.

## Como executar

Abra o terminal na pasta do projeto e execute:

```bash
docker compose up -d --build
```

Esse comando constrói as imagens necessárias e inicia os três servidores e o balanceador.

Para verificar se os contêineres estão funcionando:

```bash
docker compose ps
```

Os quatro contêineres devem aparecer com o status `Up`.

## Acessando a aplicação

Após iniciar os contêineres, acesse no navegador:

- Aplicação: http://localhost:8080
- Round Robin: http://localhost:8080/rr
- Least Connections: http://localhost:8080/least

## Simulação de falha

É possível simular a indisponibilidade de um servidor utilizando:

```bash
docker compose stop server2
```

Depois, realize novas requisições ao balanceador para verificar se os demais servidores continuam atendendo.

Para restaurar o servidor:

```bash
docker compose start server2
```

Para verificar novamente os contêineres:

```bash
docker compose ps
```

## Teste de desempenho com Apache Benchmark

Foi utilizado o Apache Benchmark (AB) para simular múltiplas requisições simultâneas e observar o desempenho do sistema.

Os testes podem ser executados utilizando o Alpine Linux em um contêiner temporário, sem precisar instalar o Apache Benchmark diretamente no Windows.

### Teste Round Robin

```bash
docker run --rm alpine:3.20 sh -c "apk add --no-cache apache2-utils && ab -n 1000 -c 20 http://host.docker.internal:8080/rr"
```

### Teste Least Connections

```bash
docker run --rm alpine:3.20 sh -c "apk add --no-cache apache2-utils && ab -n 1000 -c 20 http://host.docker.internal:8080/least"
```

### Parâmetros utilizados

- `-n 1000`: quantidade total de requisições.
- `-c 20`: quantidade de requisições simultâneas.
- `--rm`: remove o contêiner temporário após a execução.

O Apache Benchmark apresenta informações como quantidade de requisições concluídas, falhas, tempo total e requisições por segundo.
