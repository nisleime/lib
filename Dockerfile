# Use a imagem oficial do PHP
FROM php:8.1-cli

# Defina o diretório de trabalho no contêiner
WORKDIR /var/www/html

# Instale dependências necessárias e extensões PHP
RUN apt-get update && \
    apt-get install -y libpq-dev libzip-dev unzip && \
    docker-php-ext-install pdo pdo_mysql

# Copie os arquivos do projeto para o contêiner
COPY . .

# Exponha a porta que o servidor embutido do PHP vai usar
EXPOSE 8000

# Comando para rodar o servidor embutido do PHP
CMD [ "php", "-S", "0.0.0.0:8000", "-t", "/var/www/html" ]
