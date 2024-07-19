package roofs;

import static java.lang.System.out;

// Класс WoodRoof представляет крышу с деревянной отделкой.
public class WoodRoof implements Roof {

    // Метод cover() выполняет покрытие крыши деревянной отделкой.
    @Override
    public Roof cover() {
        out.println("Покрытие крыши деревянной отделкой");
        return this;
    }

    // Метод waterProtect() обеспечивает защиту крыши от воды.
    @Override
    public void waterProtect() {
        out.println("Защита крыши от воды");
    }
}
