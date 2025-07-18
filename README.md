# Search de Produtos

Search de produtos com Laravel Livewire e TailwindCSS.

## Recursos

- **Filtros avançados** (nome, categoria, marca)
- **Paginação** de resultados
- **Docker-ready**

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

## Variáveis de Ambiente

Chaves obrigatórias no `.env`:

```ini
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravellivewire
DB_USERNAME=root
DB_PASSWORD=rootpass
```
