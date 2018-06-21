FROM php:7.2.6-cli-alpine3.7

# Include composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy source code
WORKDIR /usr/src
COPY . /usr/src

# Install dependencies
RUN composer install
