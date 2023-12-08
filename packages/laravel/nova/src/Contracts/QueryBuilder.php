<?php

namespace Laravel\Nova\Contracts;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\TrashedStatus;

/**
 * Interface QueryBuilder
 * ���������� �������� ��� ����������� ��������, ������������� � Laravel Nova.
 */
interface QueryBuilder
{
    /**
     * ��������� ������� ������ �� ���������� �����.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $key
     * @return $this
     */
    public function whereKey($query, $key);

    /**
     * ��������� ����������, ���������� � ������� ������ � �������.
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
     * ������������ ���������� �������, ������������ ��������.
     *
     * @param  int  $limit
     * @return $this
     */
    public function take($limit);

    /**
     * ������������� ����� �� ���������� �������.
     *
     * @param  int  $limit
     * @return $this
     */
    public function limit($limit);

    /**
     * �������� ��������� ����������� �������.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function get();

    /**
     * �������� ������� ��������� ����������� �������.
     *
     * @param  int  $chunkSize
     * @return \Illuminate\Support\LazyCollection
     */
    public function lazy($chunkSize = 1000);

    /**
     * �������� ������� ��������� ����������� �������.
     *
     * @return \Illuminate\Support\LazyCollection
     */
    public function cursor();

    /**
     * ���������� ���������� �������.
     *
     * @param  int  $perPage
     * @return array{0: \Illuminate\Contracts\Pagination\Paginator, 1: int|null, 2: bool}
     */
    public function paginate($perPage);

    /**
     * ���������� ������ � ������� ���� Eloquent.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function toBase();

    /**
     * ���������� ������ � ������� ���� Query Builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function toBaseQueryBuilder();
}
