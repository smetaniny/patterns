package platforms;

public class MicrosoftSQLDB implements Database {

    /**
     * Метод для проверки наличия пользователя в базе данных Microsoft SQL.
     * @param userName Имя пользователя, которое нужно проверить.
     * @return `true`, если пользователь с указанным именем существует, иначе `false`.
     */
    @Override
    public boolean hasUser(String userName) {
        System.out.printf("SELECT * FROM Users WHERE UserName='%s'<br />", userName);
        return true; // Здесь можно добавить реальную проверку в базе данных
    }

    /**
     * Метод для выполнения запроса данных из базы данных Microsoft SQL.
     */
    @Override
    public void queryData() {
        System.out.println("SELECT TOP 10 * FROM DataTable"); // Пример SQL-запроса
    }
}
