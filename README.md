# AmppsReport version 3.6 ลง Docker ได้ แต่ไม่สามารถ Run ได้
EXPOSE  80
#EXPOSE  9007
#EXPOSE  9008
#EXPOSE  8085
CMD ["/usr/local/ampps/apache/bin/httpd","-DFOREGROUND"]

/usr/local/ampps/apache/conf/httpd.conf  บรรทัดที่ 570
จาก /usr/local/ampps/python/python.conf เป้น /usr/local/ampps/conf/python.conf


