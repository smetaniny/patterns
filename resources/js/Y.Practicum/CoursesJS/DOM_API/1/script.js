'use strict';

/**
 * Генерация HTML списка чатов
 * @param {Chat[]} chats - Массив объектов чатов, каждый из которых содержит заголовок и сообщение
 * @return {HTMLUListElement} - Список чатов в виде HTML элемента <ul>
 */
function makeChatsList(chats) {
    // Создаем элемент <ul> для списка чатов
    const ul = document.createElement("ul");

    // Проходим по каждому объекту чата в массиве chats
    chats.forEach(chat => {
        // Создаем элемент <li> для каждого чата
        const li = document.createElement("li");

        // Создаем элемент <h2> для заголовка чата
        const title = document.createElement("h2");
        // Устанавливаем текстовое содержимое заголовка
        title.textContent = chat.title;

        // Создаем элемент <p> для сообщения чата
        const message = document.createElement("p");
        // Устанавливаем текстовое содержимое сообщения
        message.textContent = chat.message;

        // Добавляем заголовок и сообщение в элемент <li>
        li.appendChild(title);
        li.appendChild(message);

        // Добавляем элемент <li> в элемент <ul>
        ul.appendChild(li);
    });

    // Возвращаем заполненный элемент <ul>
    return ul;
}

// Массив объектов чатов с заголовками и сообщениями
let chats = [
    {title: "Заголовок 1", message: "Сообщение 1"},
    {title: "Заголовок 2", message: "Сообщение 2"},
    {title: "Заголовок 3", message: "Сообщение 3"},
    {title: "Заголовок 4", message: "Сообщение 4"},
];

// Ждем, пока DOM будет полностью загружен
document.addEventListener("DOMContentLoaded", () => {
    // Вставляем элемент <ul> с чатом перед первым дочерним элементом <body>
    document.body.insertBefore(makeChatsList(chats), document.body.firstChild);
});
