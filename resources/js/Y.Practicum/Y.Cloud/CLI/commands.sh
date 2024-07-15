# Список всех папок (folders) в вашем Yandex Cloud аккаунте.
yc resource-manager folders list

# Скопируйте название каталога, где хранится образ. В примере это default.
# Назначьте системной группе allAuthenticatedUsers роль compute.images.user
# Открыли всем аутентифицированным пользователям Yandex Cloud доступ к папке с образом.
yc resource-manager folder add-access-binding default \
  --role compute.images.user \
  --subject system:allAuthenticatedUsers

# Список публичных образов, доступных в Yandex Cloud
yc compute image list --folder-id standard-images
