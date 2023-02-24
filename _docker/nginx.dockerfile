FROM nginx

ADD _docker/conf/vhost.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www
