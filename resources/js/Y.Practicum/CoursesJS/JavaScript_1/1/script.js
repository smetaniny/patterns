/**
 * Функция для инвертирования ключей и значений объекта
 *
 * @param {Object} obj - Исходный объект
 * @returns {Object} - Инвертированный объект
 */
function invert(obj) {
    // Получаем массив пар [ключ, значение] из объекта
    return Object.entries(obj).reduce(function (result, [key, value]) {
        // Меняем местами
        result[value] = key;
        // Вернем результат
        return result;
    }, {})

}

// Исходный объект
let obj = {a: 1, b: 2, c: 3};

// Инвертируем объект
let inverted = invert(obj);

// Выводим инвертированный объект в консоль
console.log(inverted); // Вывод: { '1': 'a', '2': 'b', '3': 'c' }
