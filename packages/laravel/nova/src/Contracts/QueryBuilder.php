<?php

namespace Laravel\Nova\Contracts;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\TrashedStatus;

/**
 * Interface QueryBuilder
 * Определяет контракт для построителя запросов, используемого в Laravel Nova.
 */
interface QueryBuilder
{
    /**
     * Применяет условие поиска по первичному ключу.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $key
     * @return $this
     */
    public function whereKey($query, $key);

    /**
     * Применяет фильтрацию, сортировку и условие поиска к запросу.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string|null  $search
     * @param  array<int, \Laravel\Nova\Query\ApplyFilter>  $filters
     * @param  array<string, string>  $orderings
     * @param  string  $withTrashed
     * @return $this
     */
    public function search(NovaRequest $request, $query, $search = null,
                           array $filters = [], array $orderings = [],
                                       $withTrashed = TrashedStatus::DEFAULT);

    /**
     * Ограничивает количество записей, возвращаемых запросом.
     *
     * @param  int  $limit
     * @return $this
     */
    public function take($limit);

    /**
     * Устанавливает лимит на количество записей.
     *
     * @param  int  $limit
     * @return $this
     */
    public function limit($limit);

    /**
     * Получает коллекцию результатов запроса.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function get();

    /**
     * Получает ленивую коллекцию результатов запроса.
     *
     * @param  int  $chunkSize
     * @return \Illuminate\Support\LazyCollection
     */
    public function lazy($chunkSize = 1000);

    /**
     * Получает ленивую коллекцию результатов запроса.
     *
     * @return \Illuminate\Support\LazyCollection
     */
    public function cursor();

    /**
     * Пагинирует результаты запроса.
     *
     * @param  int  $perPage
     * @return array{0: \Illuminate\Contracts\Pagination\Paginator, 1: int|null, 2: bool}
     */
    public function paginate($perPage);

    /**
     * Возвращает запрос в базовом виде Eloquent.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function toBase();

    /**
     * Возвращает запрос в базовом виде Query Builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function toBaseQueryBuilder();
}
