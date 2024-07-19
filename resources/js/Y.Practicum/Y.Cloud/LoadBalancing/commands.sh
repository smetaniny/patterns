# Создайте файл startup.sh со следующим содержимым:
# !/bin/bash
apt-get update
apt-get install -y nginx
service nginx start
sed -i -- "s/nginx/Yandex Cloud - ${HOSTNAME}/" /var/www/html/index.nginx-debian.html
EOF

# Чтобы создать ВМ с помощью Yandex Cloud CLI
yc compute instance create \
--name demo-2 \
--hostname demo-2 \
--metadata-from-file user-data=E:\startup.sh \
--create-boot-disk image-folder-id=standard-images,image-family=ubuntu-2004-lts \
--zone ru-central1-a \
--network-interface subnet-name=yc-public,nat-ip-version=ipv4
