#!/bin/bash

#ставим весь необходимый софт
apt-get update
apt-get install git-core nodejs npm
ln -s /usr/bin/nodejs /usr/bin/node
npm install -g bower
npm install -g less
npm install -g less-plugin-clean-css

#конфигурим git
git config --global user.email "neket313@gmail.com"
git config --global user.name "HEKET313"
git config --global color.ui true

#разворачиваем приложение
cd /var/www
git clone git@github.com:Amethyst-web/amethyst-ws.git
cd amethyst-ws/bash
source deploy.sh