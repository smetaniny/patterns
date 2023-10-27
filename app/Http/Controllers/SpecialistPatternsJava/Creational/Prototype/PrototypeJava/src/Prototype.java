// Интерфейс `Prototype` представляет прототип объекта.

public interface Prototype {
    // Статический метод для создания красной точки (объекта-прототипа).
    public static Prototype createRedPoint() {
        // Возвращаем клон прототипа красной точки из хранилища.
        return Program.protos.get("red").Clone();
    }

    // Метод Clone() используется для создания копии объекта-прототипа.
    Prototype Clone();
}
