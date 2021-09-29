ROM ubuntu:18.04
LABEL maintainer="dohnetwork@gmail.com"
LABEL description="Ubunta"
#RUN apt-get -y update &&  DEBIAN_FRONTEND=noninteractive  apt-get install  -y  php python python-pip libmysqlclient-dev ftp nano cron \
RUN apt-get -y update &&  DEBIAN_FRONTEND=noninteractive  apt-get install  -y  curl wget python2.7 php-cli php-mbstring git unzip \
 && mkdir /install
RUN chmod -R 777 /install cd /tmp && curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
#RUN  apt-get install curl php-cli php-mbstring git unzip
#   71  apt install composer
#   72  ls
#RUN composer require mpdf/mpdf:5.7.0
WORKDIR /install

RUN wget https://s4.softaculous.com/a/ampps/files/Ampps-3.5-x86_64.run
RUN ls -l
RUN pwd
#RUN cd /
#RUN find ./ -name Ampps-3.5-x86_64.run
RUN chmod 777 ./Ampps-3.5-x86_64.run
RUN ./Ampps-3.5-x86_64.run
#RUN ./usr/local/ampps/apache/bin/httpd
# expose websocket and TCP port (adjust as needed for your AMPS config file)
#EXPOSE 9007
#EXPOSE 9008

# expose Admin port (adjust as needed for your AMPS config file)
#EXPOSE 8085


#EXPOSE 80
#CMD ./ubash: y: command not found
#sr/local/ampps/apache/bin/apachectl -D FOREGROUND
#RUN pwd
#RUN ls -l
#COPY /python.conf /usr/local/ampps/python/
#COPY file/python.conf /usr/local/ampps/python/
#COPY files/php/php-fpm.conf /etc/php7/
#EXPOSE 80
#CMD usr/local/ampps/apache/bin/apachectl -D FOREGROUND
#CMD usr/local/ampps/apache/bin/httpd
#CMD /usr/local/ampps/apache/bin/httpd
# /usr/local/ampps/apache/conf/httpd.conf: Could not open configuration file /usr/local/ampps/python/python.conf:
COPY python.conf  /usr/local/ampps/python/python.conf
#RUN /usr/local/ampps/apache/bin/httpd test run
#/usr/local/ampps/apache/bin
#RUN cp /usr/local/ampps/python/python.conf  /usr/local/ampps/conf/python.conf
#COPY python.conf  /usr/local/ampps/conf/python.conf
RUN pwd
RUN ls -l
EXPOSE  80
#EXPOSE  9007
#EXPOSE  9008
#EXPOSE  8085

WORKDIR /usr/local/ampps/www
RUN composer require mpdf/mpdf:5.7.0
COPY ./data ./
#WORKDIR /install


CMD ["/usr/local/ampps/apache/bin/httpd","-DFOREGROUND"]



