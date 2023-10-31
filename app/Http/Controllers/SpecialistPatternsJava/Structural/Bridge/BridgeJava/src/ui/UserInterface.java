package ui;
import static java.lang.System.out;

import platforms.Database;

public class UserInterface {
    private Database db; // Поле для хранения объекта базы данных

    /**
     * Конструктор класса UserInterface.
     * @param db Объект базы данных, который используется в интерфейсе.
     */
    public UserInterface(Database db) {
        this.db = db;
    }

    /**
     * Метод для входа пользователя в систему.
     * @param userName Имя пользователя.
     */
    public void login(String userName) {
        // Проверка наличия пользователя в базе данных и вывод информации о входе
        if (db.hasUser(userName))
            out.printf("Пользователь %s вошел в систему как %s<br />", userName, getRole());
    }

    /**
     * Метод для отрисовки интерфейса пользователя.
     */
    public void drawInterface() {
        db.queryData(); // Выполнение запроса данных из базы данных
        out.println("Данные для обычного пользователя");
    }

    /**
     * Метод для получения роли пользователя.
     * @return Роль пользователя, например, "SimpleUser".
     */
    public String getRole() {
        return "SimpleUser";
    }
}
