# AmppsReport version 3.6 ลง Docker ได้ แต่ไม่สามารถ Run ได้
EXPOSE  80
#EXPOSE  9007
#EXPOSE  9008
#EXPOSE  8085
CMD ["/usr/local/ampps/apache/bin/httpd","-DFOREGROUND"]


