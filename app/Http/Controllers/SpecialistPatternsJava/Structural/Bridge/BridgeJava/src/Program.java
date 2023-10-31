import platforms.Database;
import platforms.MicrosoftSQLDB;
import platforms.MySQLDB;
import ui.AdminInterface;
import ui.UserInterface;

public class Program {

    public static void main(String[] args) {
        // Создание объекта базы данных Microsoft SQL и пользовательского интерфейса
        {
            Database db = new MicrosoftSQLDB();
            UserInterface ui = new UserInterface(db);

            ui.login("Sergey"); // Вход пользователя
            ui.drawInterface(); // Отображение пользовательского интерфейса
        }

        // Создание объекта базы данных Microsoft SQL и администраторского интерфейса
        {
            Database db = new MicrosoftSQLDB();
            UserInterface ui = new AdminInterface(db);

            ui.login("Sergey"); // Вход администратора
            ui.drawInterface(); // Отображение администраторского интерфейса
        }

        // Создание объекта базы данных MySQL и пользовательского интерфейса
        {
            Database db = new MySQLDB();
            UserInterface ui = new UserInterface(db);

            ui.login("Sergey"); // Вход пользователя
            ui.drawInterface(); // Отображение пользовательского интерфейса
        }

        // Создание объекта базы данных MySQL и администраторского интерфейса
        {
            Database db = new MySQLDB();
            UserInterface ui = new AdminInterface(db);

            ui.login("Sergey"); // Вход администратора
            ui.drawInterface(); // Отображение администраторского интерфейса
        }
    }
}
