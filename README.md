# ShopNow — Balanceador de Carga

## Sobre o projeto

Projeto acadêmico que simula um e-commerce chamado ShopNow durante a Black Friday, utilizando múltiplas instâncias de servidores e um balanceador de carga para distribuir as requisições.

## Tecnologias utilizadas

- PHP 8.4
- Apache
- Nginx
- Docker e Docker Compose
- Apache Benchmark (AB)

## Arquitetura

O projeto possui três instâncias independentes da aplicação PHP, executadas em contêineres Docker.

O Nginx atua como balanceador de carga, recebendo as requisições na porta 8080 e distribuindo-as entre os servidores.

## Algoritmos implementados

- **Round Robin:** distribui as requisições sequencialmente entre os servidores.
- **Least Connections:** direciona as requisições ao servidor com menos conexões ativas.

## Como executar

Na pasta do projeto, execute:

```bash
docker compose up -d --build
```

Acesse no navegador:

http://localhost:8080

Para testar os algoritmos:

- Round Robin: http://localhost:8080/rr
- Least Connections: http://localhost:8080/least

## Teste de falha

É possível simular a indisponibilidade de um servidor:

```bash
docker compose stop server2
```

Depois, realize novas requisições ao balanceador para verificar se os demais servidores continuam atendendo.

Para restaurar:

```bash
docker compose start server2
```

## Teste de desempenho

Foi utilizado o Apache Benchmark para simular múltiplas requisições simultâneas e observar o desempenho do sistema.

Exemplo:

```bash
ab -n 1000 -c 20 http://localhost:8080/rr
```

## Encerramento

Para parar os contêineres:

```bash
docker compose down
```

## Autor

Projeto desenvolvido individualmente para fins acadêmicos.