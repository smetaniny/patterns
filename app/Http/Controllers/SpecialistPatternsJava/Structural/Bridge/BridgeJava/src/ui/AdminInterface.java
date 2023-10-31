package ui;
import platforms.Database;

public class AdminInterface extends UserInterface {

    /**
     * Конструктор класса AdminInterface.
     * @param db Объект базы данных, который используется в интерфейсе.
     */
    public AdminInterface(Database db) {
        super(db); // Вызов конструктора родительского класса (UserInterface)
    }

    /**
     * Переопределенный метод для получения роли пользователя.
     * @return Роль пользователя, в данном случае "Administrator".
     */
    @Override
    public String getRole() {
        return "Administrator"; // Возвращает роль администратора
    }
}
