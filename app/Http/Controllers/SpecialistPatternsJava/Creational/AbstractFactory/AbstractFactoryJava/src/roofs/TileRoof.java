package roofs;

import static java.lang.System.out;

// Класс TileRoof представляет крышу с керамической черепицей.
public class TileRoof implements Roof {

    // Метод cover() выполняет покрытие крыши керамической черепицей.
    @Override
    public Roof cover() {
        out.println("Покрытие крыши керамической черепицей");
        return this;
    }

    // Метод waterProtect() обеспечивает защиту крыши от воды.
    @Override
    public void waterProtect() {
        out.println("Защита крыши от воды");
    }
}
