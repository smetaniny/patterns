#ifndef GLYPH_CONTEXT_H
#define GLYPH_CONTEXT_H

// Предварительное объявление классов BTree и Font, чтобы избежать циклических зависимостей.
class BTree;
class Font;

// Определение класса GlyphContext.
class GlyphContext {
public:
    // Конструктор по умолчанию.
    GlyphContext();
    // Виртуальный деструктор.
    virtual ~GlyphContext();

    // Перемещение к следующему элементу в контексте.
    virtual void Next(int step = 1);
    // Вставка элементов в контекст.
    virtual void Insert(int quantity = 1);

    // Получение текущего шрифта.
    virtual Font* GetFont();
    // Установка шрифта для определенного количества элементов.
    virtual void SetFont(Font*, int span = 1);

private:
    // Индекс текущего элемента в контексте.
    int _index;
    // Указатель на BTree, который хранит информацию о шрифтах для глифов.
    BTree* _fonts;
};

#endif /* GLYPH_CONTEXT_H */

