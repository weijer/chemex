FROM celaraze/chemex:latest
RUN apt-get update

COPY ./docker-compose/build/.env.docker /var/www/chemex/.env
WORKDIR /var/www/chemex/
RUN git reset --hard && git pull --force
RUN composer update

COPY ./docker-compose/build/docker-entrypoint.sh /docker-entrypoint.sh
RUN chmod +x /docker-entrypoint.sh

entrypoint ["/docker-entrypoint.sh"]
