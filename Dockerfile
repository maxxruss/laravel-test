
FROM chialab/php-dev:7.4-apache

ENV TZ=Europe/Moscow

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone 

RUN export DEBIAN_FRONTEND=noninteractive DEBCONF_NONINTERACTIVE_SEEN=true && \
    apt-get clean && apt-get update && apt-get install -y \
    msmtp \
    iproute2 \
    mc \
    curl

# Install composer
RUN apt-get update \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

#NPM
# RUN apt-get install -y nodejs npm
RUN curl -fsSL https://deb.nodesource.com/setup_14.x | bash - &&\
apt-get install -y nodejs

RUN apt-get install memcached

WORKDIR /var/www/html

COPY entrypoint.sh /entrypoint.sh
COPY apache.conf /etc/apache2/sites-available/000-default.conf
COPY local.ini /usr/local/etc/php/conf.d/local.ini

RUN chown -R www-data:www-data /var/www/html

CMD ["bash", "/entrypoint.sh"]