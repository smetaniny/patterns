#ifndef GLYPH_H
#define GLYPH_H

// Объявление заголовочного файла GLYPH_H, чтобы предотвратить многократное включение

class GlyphContext; // Объявление класса GlyphContext
class Font; // Объявление класса Font
class Window; // Объявление класса Window

/**
   Класс Glyph представляет абстрактный глиф, который является базовым классом для всех глифов.
   Он определяет общие операции над глифами, такие как отрисовка, установка и получение шрифта, а также навигация по глифам.
   Класс содержит виртуальные методы, которые подлежат реализации в производных классах.
*/
class Glyph {
public:
    virtual ~Glyph(); // Виртуальный деструктор

    // Виртуальная функция для отрисовки глифа
    virtual void Draw(Window*, GlyphContext&);

    // Установка шрифта глифа
    virtual void SetFont(Font*, GlyphContext&);
    // Получение шрифта глифа
    virtual Font* GetFont(GlyphContext&);

    // Переход к первому глифу
    virtual void First(GlyphContext&);
    // Переход к следующему глифу
    virtual void Next(GlyphContext&);
    // Проверка, завершено ли обход всех глифов
    virtual bool IsDone(GlyphContext&);
    // Получение текущего глифа
    virtual Glyph* Current(GlyphContext&);

    // Вставка глифа
    virtual void Insert(Glyph*, GlyphContext&);
    // Удаление глифа
    virtual void Remove(GlyphContext&);

protected:
    Glyph(); // Защищенный конструктор
};

#endif /* GLYPH_H */
