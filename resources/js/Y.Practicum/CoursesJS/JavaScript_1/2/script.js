/**
 * Функция, которая объединяет несколько объектов в один
 *
 * @param {...Object} objects - Входные объекты
 * @returns {Object} - Объединённый объект
 */
function zip(...objects) {
    // Используем reduce для объединения объектов
    return objects.reduce((acc, obj) => {
        // Объединяем текущий объект с аккумулятором
        return { ...acc, ...obj };
    }, {}); // Начинаем с пустого объекта
}

// Пример входных данных
const objects = [
    { foo: 5, bar: 6 },
    { foo: 13, baz: -1 } // foo - повторяющийся ключ
];

// Вызов функции zip и получение результата
const result = zip(...objects);

// Ожидаемый вывод: { foo: 5, bar: 6, baz: -1 }
console.log(result);
