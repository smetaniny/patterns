package platforms;

public interface Database {
    /**
     * Метод для проверки наличия пользователя в базе данных.
     * @param userName Имя пользователя, которое нужно проверить.
     * @return `true`, если пользователь с указанным именем существует, иначе `false`.
     */
    boolean hasUser(String userName);

    /**
     * Метод для выполнения запроса данных из базы данных.
     */
    void queryData();
}
