## Работа с хост-файлом

### Открытие и редактирование хост-файла

- **Открыть хост-файл с помощью Nano**
  ```sh
    sudo nano /etc/hosts
  ```
  
- **Открыть хост-файл с помощью Vim**
  ```sh
    sudo vim /etc/hosts
  ```
    

## Работа с SSH-ключами

- **Создание нового SSH-ключа**
  ```sh
    ssh-keygen -t ed25519 -C "your_email@example.com"
  ```
    
- **Просмотр содержимого публичного ключа**
  ```sh
    cat ~/.ssh/id_ed25519.pub
  ```
    
- **Копирование публичного ключа в буфер обмена (Linux)**
  ```sh
    xclip -sel clip < ~/.ssh/id_ed25519.pub
  ```
    
- **Открыть хост-файл с помощью Nano**
  ```sh
    sudo nano /etc/hosts
  ```
    
- **Открыть хост-файл с помощью Vim**
  ```sh
    sudo vim /etc/hosts
  ```
    
- **Открыть хост-файл с помощью Gedit (графический редактор)**
  ```sh
    sudo gedit /etc/hosts
  ```

- **Установка переключения раскладки на Alt+Shift**

```sh
    gsettings set org.gnome.desktop.wm.keybindings switch-input-source "['<Shift>Alt_L']"
    gsettings set org.gnome.desktop.wm.keybindings switch-input-source-backward "['<Alt>Shift_L']"
```

- **Установка переключения раскладки на Ctrl+Shift**

```sh
   gsettings set org.gnome.desktop.wm.keybindings switch-input-source-backward "['<Ctrl>Shift_L']"
```

  