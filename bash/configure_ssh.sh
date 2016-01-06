#!/bin/bash
ssh-keygen -t rsa -b 4096 -C "neket313@gmail.com"
echo "Ваш публичный ключ:"
head id_rsa.pub