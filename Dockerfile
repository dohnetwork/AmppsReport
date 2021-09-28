FROM ubuntu:18.04
LABEL maintainer="dohnetwork@gmail.com"
LABEL description="Ubunta"
#RUN apt-get -y update &&  DEBIAN_FRONTEND=noninteractive  apt-get install  -y  php python python-pip libmysqlclient-dev ftp nano cron \
RUN apt-get -y update &&  DEBIAN_FRONTEND=noninteractive  apt-get install  -y  curl \
 && mkdir /install
RUN chmod -R 755 /install
WORKDIR /install
RUN wget https://s4.softaculous.com/a/ampps/files/Ampps-3.5-x86_64.run
RUN ./install/Ampps-3.5-x86_64.run
RUN ./usr/local/ampps/apache/bin/httpd
