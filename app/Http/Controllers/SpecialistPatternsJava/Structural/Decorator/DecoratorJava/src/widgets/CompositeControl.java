package widgets;
import static java.lang.System.out;
import java.util.ArrayList;
import java.util.List;

public class CompositeControl extends UIComponent {
    protected final static char COMPOSITE_FRAME = '+';

    protected List<UIComponent> children = new ArrayList<>();

    // Метод для добавления дочернего компонента к этому композитному контролу
    public CompositeControl add(UIComponent c) {
        children.add(c);
        return this;
    }

    // Метод для удаления дочернего компонента из этого композитного контрола
    public void remove(UIComponent c) {
        children.remove(c);
    }

    // Метод для получения списка дочерних компонентов
    public List<UIComponent> getChildren() {
        return children;
    }

    // Метод для отрисовки всего композитного контрола
    public void draw() {
        for(int i = 0; i < getHeight(); i++)
            draw(i);
    }

    // Приватный метод для печати рамки композитного контрола
    private void printBorder() {
        for(int i = 0; i < getWidth() - 1; i++)
            out.print(COMPOSITE_FRAME);
    }

    // Метод для отрисовки композитного контрола на указанной строке
    @Override
    public boolean draw(int line) {
        if (line == 0 || line == getHeight() - 1) {
            printBorder();
            drawLineFinish();
            return true;
        }
        if (line > 0 && line < getHeight() - 1) {
            out.print(COMPOSITE_FRAME);
            for (UIComponent c : children)
                if (!c.draw(line - 1))
                    for (int i = 0; i < c.getWidth(); i++)
                        out.print(' ');
            drawLineFinish();
            return true;
        }
        return false;
    }

    // Метод для завершения отрисовки строки
    public void drawLineFinish() {
        out.print(COMPOSITE_FRAME);
    }

    // Метод для получения высоты композитного контрола
    @Override
    public int getHeight() {
        int max = 0;
        for (UIComponent c : children)
            if (c.getHeight() > max)
                max = c.getHeight();
        return max + 2;
    }

    // Метод для получения ширины композитного контрола
    @Override
    public int getWidth() {
        int summa = 0;
        for (UIComponent c : children)
            summa += c.getWidth();
        return summa + 2;
    }
}
