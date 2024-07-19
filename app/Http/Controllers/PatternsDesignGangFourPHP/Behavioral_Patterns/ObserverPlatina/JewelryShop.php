<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\ObserverPlatina;

/**
 * Субъект (магазин ювелирных изделий), который наблюдаем.
 */
class JewelryShop
{
    // Массив наблюдателей
    private array $observers = [];

    /**
     * Метод для присоединения наблюдателя.
     *
     * @param Observer $observer Наблюдатель, который подписывается на уведомления.
     */
    public function attach(Observer $observer): void
    {
        // Добавляем наблюдателя в массив
        $this->observers[] = $observer;
    }

    /**
     * Метод для отсоединения наблюдателя.
     *
     * @param Observer $observerToRemove Наблюдатель, который нужно отсоединить.
     */
    public function detach(Observer $observerToRemove): void
    {
        // Фильтруем массив наблюдателей, оставляя только тех, которые необходимо оставить
        $this->observers = array_filter($this->observers, function ($observer) use ($observerToRemove) {
            // Возвращаем true только для наблюдателей, которые не совпадают с тем, который нужно удалить
            return $observer !== $observerToRemove;

        });
    }

    /**
     * Метод для уведомления всех наблюдателей о изменениях в магазине.
     */
    public function notify(): void
    {
        // Проходим по массиву наблюдателей и вызываем у каждого метод update()
        foreach ($this->observers as $observer) {
            // Вызываем метод update() для каждого наблюдателя, передавая текущий объект-субъект в качестве аргумента
            $observer->update($this);
        }
    }

    /**
     * Метод для добавления новых ювелирных изделий в магазин.
     */
    public function addNewJewelry(): void
    {
        // Логика добавления новых ювелирных изделий в магазин
        // После добавления уведомляем наблюдателей
        $this->notify();
    }
}
