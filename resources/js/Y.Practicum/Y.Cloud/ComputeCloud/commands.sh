#Для отключения от серийной консоли нажмите Enter, затем введите ~ (тильда и точка) или используйте Ctrl + D.

#Подключаемся по ssh
ssh smsergeyv@158.160.117.216
#Задаем пароль VM
sudo passwd smetaniny-vm
#Получаем доступ к серийной консоли - у меня не получилось
ssh -t -p 9600 -o IdentitiesOnly=yes -i ~/.ssh/id_rsa fv4gjvcb6f7rhttmqq7l.smetaniny-vm@serialssh.cloud.yandex.net

