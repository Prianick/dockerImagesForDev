FROM nginx:1.20

WORKDIR /app/www/html

RUN apt update && apt install -y iputils-ping procps nano git zip unzip

# копируем приложение куда надо
COPY ./nginx.conf /etc/nginx/nginx.conf
