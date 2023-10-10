<?php

namespace PlatinaKostroma\ImageProcessor\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use PlatinaKostroma\ImageProcessor\Contracts\ImageProcessorInterface;

/**
 * Обработка изображения
 */
class ImageProcessor implements ImageProcessorInterface
{
    // Оригинальное имя файла
    protected ?string $originalName = null;

    // Имя файла в безопасном формате
    protected ?string $fileName = null;

    // Объект файла
    protected ?UploadedFile $file = null;

    // Путь до файла
    protected ?string $path = null;

    // Массив путей
    protected array $storePaths = [];

    /**
     * Обработка файла
     *
     * @param UploadedFile $file - объект файла
     * @param string $path - путь до файла
     *
     * @return self - вернем текущий класс
     */
    public function processImage(UploadedFile $file, string $path): self
    {
        // Присваиваем объект файла
        $this->file = $file;

        // Присваиваем путь
        $this->path = $path;

        // Получаем оригинальное имя файла
        $this->originalName = pathinfo($this->file->getClientOriginalName(), PATHINFO_FILENAME);

        return $this;
    }

    /**
     * Обработка имени файла
     *
     * @return self - вернем текущий класс
     */
    public function sanitizeFileName(): self
    {
        if ($this->originalName === null) return $this;

        // Удалим все символы, кроме латинских букв, цифр, точки и подчеркивания
        $this->fileName = preg_replace('/[^A-Za-z\d_.-]/u', '', $this->originalName);

        // Преобразуем имя файла в безопасный формат
        $this->fileName = Str::slug($this->fileName);

        // Преобразуем имя файла в нижний регистр и вернем в ответ
        $this->fileName = mb_strtolower($this->fileName, 'UTF-8');

        return $this;
    }

    /**
     * Запись файла
     *
     * @return self - вернем текущий класс
     */
    public function storeFile(): self
    {
        if ($this->path === null || $this->fileName === null || $this->file === null) return $this;

        // Сохраняем файл
        $storePath = $this->file->storeAs($this->path, $this->fileName . '.' . $this->file->getClientOriginalExtension());

        // Пишем в массив путь, если пришел
        if ($storePath !== false) {
            // Заменяем "public" на "storage" в пути
            $this->storePaths[] = str_replace('public', '/storage', $storePath);
        }

        return $this;
    }

    /**
     * Конвертируем в webp и запись файла
     */
    public function convertToWebP(): self
    {
        if ($this->path === null || $this->fileName === null || $this->file === null) return $this;

        // Создаем экземпляр Intervention Image из загруженного файла
        $image = Image::make($this->file);

        // Конвертируем в webp и пишем файл
        $image->encode('webp', 100)->save(storage_path('app/' . $this->path . '/' . $this->fileName . '.webp'));

        return $this;
    }


    /**
     * Получение массива путей сохраненных файлов
     *
     * @return array - массив путей
     */
    public function getStoredPaths(): array
    {
        return $this->storePaths;
    }
}
