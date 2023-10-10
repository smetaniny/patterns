<?php

namespace PlatinaKostroma\ImageProcessor\Contracts;

use Illuminate\Http\UploadedFile;

/**
 * Interface ImageProcessorInterface
 *
 * Этот интерфейс определяет контракт для классов, которые обрабатывают изображения.
 */
interface ImageProcessorInterface
{
    /**
     * Обрабатывает загруженное изображение.
     *
     * @param UploadedFile $file Загруженное изображение в формате UploadedFile.
     * @param string $path Путь, по которому следует сохранить обработанное изображение.
     *
     * @return self Возвращает текущий класс
     */
    public function processImage(UploadedFile $file, string $path): self;

    /**
     * Обработка имени файла
     *
     * * @return self Возвращает текущий класс
     */
    public function sanitizeFileName(): self;

    /**
     * Сохранение файла
     *
     * @return self Возвращает текущий класс
     */
    public function storeFile(): self;

    /**
     * Сохранение файла в WebP
     *
     * @return self Возвращает текущий класс
     */
    public function convertToWebP(): self;

    /**
     * Получение массива путей файлов
     *
     * @return array - массив путей
     */
    public function getStoredPaths(): array;
}
