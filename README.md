# Search de Produtos

Search de produtos com Laravel Livewire e TailwindCSS.

## Recursos

- **Filtros avançados** (nome, categoria, marca)
- **Paginação** de resultados
- **Docker-ready**
                  |

## Rodando projeto com Docker

1. Clone o repositório:
   ```bash
   git clone https://github.com/neiltonrodriguez/laravel-livewire-test

2. Construa a imagem e inicie o container:
   ```bash
   entre na pasta /docker e esecute o comando abaixo
   docker-compose up --build
   ```

3. aguarde o processo todo concluir e Acesse:
   - Web: `http://localhost:8000/`


## Instalação local manual

1. Clone o repositório:
   ```bash
   git clone https://github.com/neiltonrodriguez/laravel-livewire-test
   cd laravel-livewire-test, todos os demais comandos pra instalação manual, será na pasta ./application
   ```

2. Instale as dependências:
   ```bash
   execute os comandos abaixo:
   composer install
   npm install
   ```

3. Configure o ambiente (copie o `.env.example`):
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Execute as migrações:
   ```bash
   php artisan migrate --seed
   ```

5. Inicie o servidor:
   ```bash
   execute os comandos
   php artisan serve
   npm run dev
   ```

## Variáveis de Ambiente

Chaves obrigatórias no `.env`:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravellivewire
DB_USERNAME=seu usuario mysql OU root (caso vá rodar com doker)
DB_PASSWORD=sua senha do mysql local OU rootpass (caso vá rodar com doker)
```
