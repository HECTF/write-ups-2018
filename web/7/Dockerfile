FROM ubuntu:14.04

MAINTAINER 5am3 <i@5am3.com>
ENV REFRESHED_AT 2018-11-07
ENV LANG C.UTF-8
ENV DEBIAN_FRONTEND noninteractive

# 先写 修改源/更新 【如果必须的话】
# 替换源（这里可用sed或者直接COPY一个完整的sources.list来替换）
RUN sed -i 's/http:\/\/archive.ubuntu.com\/ubuntu\//http:\/\/mirrors.163.com\/ubuntu\//g' /etc/apt/sources.list
# 进行更新
RUN apt update -y
# 安装wget
RUN apt -y install wget

# 安装apache2
RUN apt -yqq install apache2
# 安装php5
RUN apt -yqq install php5 libapache2-mod-php5
# 安装php扩展
RUN apt install -yqq php5-mysql php5-curl php5-gd php5-intl php-pear php5-imagick php5-imap php5-mcrypt php5-memcache php5-ming php5-ps php5-pspell php5-recode php5-snmp php5-sqlite php5-tidy php5-xmlrpc php5-xsl


# 例如去掉apache2的列目录漏洞
RUN sed -i 's/Options Indexes FollowSymLinks/Options None/' /etc/apache2/apache2.conf


# 添加文件到相应目录
ADD html/ /var/www/html/

# 删除Apache主页
RUN rm /var/www/html/index.html

# 添加start.sh，并准备开机执行

COPY ./start.sh /root/start.sh
RUN chmod +x /root/start.sh
ENTRYPOINT cd /root; ./start.sh


EXPOSE 80
