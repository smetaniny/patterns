# Записать кеш операционной системы на диск (иначе изменения файлов, хранящиеся в оперативной памяти, будут потеряны)
sync

# Чтобы узнать нужный файл устройства диска, выполните команду df -h для вывода полного списка устройств и соответствующих точек монтирования
f -h

smsergeyv@smetaniny-vm:~$ df -h
Filesystem      Size  Used Avail Use% Mounted on
tmpfs           197M  1.1M  196M   1% /run
/dev/vda2        20G  2.9G   16G  16% /
tmpfs           984M     0  984M   0% /dev/shm
tmpfs           5.0M     0  5.0M   0% /run/lock
tmpfs           197M   12K  197M   1% /run/user/360143053

# Затем, чтобы заморозить файловую систему, запустите команду sudo fsfreeze --freeze <точка_монтирования>.
sudo fsfreeze --freeze /

# Разморозить файловую систему
sudo fsfreeze --unfreeze /

# Обновление системы sudo apt-get update и sudo apt-get dist-upgrade. Дождитесь, пока обновление завершится.
sudo apt-get update
sudo apt-get dist-upgrade

# Сымитируйте повреждение системы, запустив команду
sudo rm -rf --no-preserve-root /
