<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersAdminRolesTable extends Migration
{
    /**
     * Роли для пользователей админки.
     * php artisan make:migration ChangeUsersAdminRolesTable2 --table=users_admin_roles
     * @return void
     */
    public function up()
    {
        Schema::create('users_admin_roles', function (Blueprint $table) {
            $table->id();

            // Общие
            $table->string('name')->comment('Название роли')->unique()->nullable();
            $table->text('description')->comment('Описание роли')->nullable();
            $table->integer('view_system')->comment('Просмотр информации о системе')->nullable();
            $table->integer('change_password')->comment('Смена пароля')->nullable();

            // Содержимое
            $table->integer('creating_resources')->comment('Создание новых ресурсов')->nullable();
            $table->integer('editing_resources')->comment('Редактирование ресурсов')->nullable();
            $table->integer('publishing_resources')->comment('Публикация ресурсов')->nullable();
            $table->integer('deleting_resources')->comment('Удаление ресурсов')->nullable();
            $table->integer('clearing_baskets')->comment('Очищение корзины')->nullable();
            $table->integer('view_unpublished_resources')->comment('Просмотр неопубликованных ресурсов')->nullable();
            $table->integer('view_resources')->comment('Просмотр ресурсов')->nullable();
            $table->integer('who_made_edits')->comment('id user — кто внес изменения')->nullable();

            // Роли
            $table->integer('rolesAdminList')->comment('Просмотр ролей')->nullable();
            $table->integer('rolesAdminEdit')->comment('Редактирование ролей')->nullable();
            $table->integer('rolesAdminCreate')->comment('Создание новых ролей')->nullable();
            $table->integer('rolesAdminDelete')->comment('Удаление ролей')->nullable();

            // Пользователи админки
            $table->integer('usersAdminList')->comment('Просмотр новых пользователей админки')->nullable();
            $table->integer('usersAdminEdit')->comment('Редактирование пользователей админки')->nullable();
            $table->integer('usersAdminCreate')->comment('Созданиепользователей админки')->nullable();
            $table->integer('usersAdminDelete')->comment('Удалениепользователей админки')->nullable();

            // Акции 1С
            $table->integer('stocks1cList')->comment('Просмотр акций 1С')->nullable();
            $table->integer('stocks1cEdit')->comment('Редактирование акций 1С')->nullable();
            $table->integer('stocks1cCreate')->comment('Создание акций 1С')->nullable();
            $table->integer('stocks1cDelete')->comment('Удаление акций 1С')->nullable();

            // Сортировка фильтра
            $table->integer('filterSortList')->comment('Просмотр сортировки фильтра')->nullable();
            $table->integer('filterSortEdit')->comment('Редактирование сортировки фильтра')->nullable();
            $table->integer('filterSortCreate')->comment('Создание сортировки фильтра')->nullable();
            $table->integer('filterSortDelete')->comment('Удаление сортировки фильтра')->nullable();

            // Правила акций
            $table->integer('ruleList')->comment('Просмотр правила акции')->nullable();
            $table->integer('ruleEdit')->comment('Редактирование правила акции')->nullable();
            $table->integer('ruleCreate')->comment('Создание правила акции')->nullable();
            $table->integer('ruleDelete')->comment('Удаление правила акции')->nullable();

            // Акции
            $table->integer('stocksList')->comment('Просмотр акции')->nullable();
            $table->integer('stocksEdit')->comment('Редактирование акции')->nullable();
            $table->integer('stocksCreate')->comment('Создание акции')->nullable();
            $table->integer('stocksDelete')->comment('Удаление акции')->nullable();

            // Блог
            $table->integer('blogArticlesList')->comment('Просмотр статьи блога')->nullable();
            $table->integer('blogArticlesEdit')->comment('Редактирование статьи блога')->nullable();
            $table->integer('blogArticlesCreate')->comment('Создание статьи блога')->nullable();
            $table->integer('blogArticlesDelete')->comment('Удаление статьи блога')->nullable();

            // Категорий блога
            $table->integer('blogArticlesCategoriesList')->comment('Просмотр категорий блога')->nullable();
            $table->integer('blogArticlesCategoriesEdit')->comment('Редактирование категорий блога')->nullable();
            $table->integer('blogArticlesCategoriesCreate')->comment('Создание категорий блога')->nullable();
            $table->integer('blogArticlesCategoriesDelete')->comment('Удаление категорий блога')->nullable();

            // Промокод
            $table->integer('promoCodeList')->comment('Просмотр промокода')->nullable();
            $table->integer('promoCodeEdit')->comment('Редактирование промокода')->nullable();
            $table->integer('promoCodeCreate')->comment('Создание промокода')->nullable();
            $table->integer('promoCodeDelete')->comment('Удаление промокода')->nullable();

            // SEO каталог
            $table->integer('seoCatalogList')->comment('Просмотр SEO каталога')->nullable();
            $table->integer('seoCatalogEdit')->comment('Редактирование SEO каталога')->nullable();
            $table->integer('seoCatalogCreate')->comment('Создание SEO каталога')->nullable();
            $table->integer('seoCatalogDelete')->comment('Удаление SEO каталога')->nullable();

            // Товары
            $table->integer('productsAdminList')->comment('Просмотр продуктов')->nullable();
            $table->integer('productsAdminEdit')->comment('Редактирование продуктов')->nullable();
            $table->integer('productsAdminCreate')->comment('Создание продуктов')->nullable();
            $table->integer('productsAdminDelete')->comment('Удаление продуктов')->nullable();

            // Просмотр остатков товара
            $table->integer('productsDataList')->comment('Просмотр остатков товара')->nullable();
            $table->integer('productsDataEdit')->comment('Редактирование остатков товара')->nullable();
            $table->integer('productsDataCreate')->comment('Создание остатков товара')->nullable();
            $table->integer('productsDataDelete')->comment('Удаление остатков товара')->nullable();

            // Пользователи
            $table->integer('usersList')->comment('Просмотр пользователей')->nullable();
            $table->integer('usersEdit')->comment('Редактирование пользователей')->nullable();
            $table->integer('usersCreate')->comment('Создание пользователей')->nullable();
            $table->integer('usersDelete')->comment('Удаление пользователей')->nullable();

            // Корзина
            $table->integer('basketList')->comment('Просмотр корзины')->nullable();
            $table->integer('basketEdit')->comment('Редактирование корзины')->nullable();
            $table->integer('basketCreate')->comment('Создание корзины')->nullable();
            $table->integer('basketDelete')->comment('Удаление корзины')->nullable();

            // Отзывы
            $table->integer('usersReviewList')->comment('Просмотр отзывов')->nullable();
            $table->integer('usersReviewEdit')->comment('Редактирование отзывов')->nullable();
            $table->integer('usersReviewCreate')->comment('Создание отзывов')->nullable();
            $table->integer('usersReviewDelete')->comment('Удаление отзывов')->nullable();

            // Лист ожидания
            $table->integer('usersWaitList')->comment('Просмотр литса ожидания')->nullable();
            $table->integer('usersWaitEdit')->comment('Редактирование литса ожидания')->nullable();
            $table->integer('usersWaitCreate')->comment('Создание литса ожидания')->nullable();
            $table->integer('usersWaitDelete')->comment('Удаление литса ожидания')->nullable();

            // Избранное
            $table->integer('usersWishList')->comment('Просмотр избранного')->nullable();
            $table->integer('usersWishEdit')->comment('Редактирование избранного')->nullable();
            $table->integer('usersWishCreate')->comment('Создание избранного')->nullable();
            $table->integer('usersWishDelete')->comment('Удаление избранного')->nullable();

            // Вопрос
            $table->integer('faqList')->comment('Просмотр вопросов')->nullable();
            $table->integer('faqEdit')->comment('Редактирование вопросов')->nullable();
            $table->integer('faqCreate')->comment('Создание вопросов')->nullable();
            $table->integer('faqDelete')->comment('Удаление вопросов')->nullable();

            // Корзина
            $table->integer('ordersList')->comment('Просмотр корзины')->nullable();
            $table->integer('ordersEdit')->comment('Редактирование корзины')->nullable();
            $table->integer('ordersCreate')->comment('Создание корзины')->nullable();
            $table->integer('ordersDelete')->comment('Удаление корзины')->nullable();

            // Состав заказа
            $table->integer('ordersDetailsList')->comment('Просмотр состава заказа')->nullable();
            $table->integer('ordersDetailsEdit')->comment('Редактирование состава заказа')->nullable();
            $table->integer('ordersDetailsCreate')->comment('Создание состава заказа')->nullable();
            $table->integer('ordersDetailsDelete')->comment('Удаление состава заказа')->nullable();

            // Виджет
            $table->integer('widgetList')->comment('Просмотр виджета')->nullable();
            $table->integer('widgetEdit')->comment('Редактирование виджета')->nullable();
            $table->integer('widgetCreate')->comment('Создание виджета')->nullable();
            $table->integer('widgetDelete')->comment('Удаление виджета')->nullable();

            // Заказы контекст
            $table->integer('contextOrderRolesList')->comment('Просмотр')->nullable();
            $table->integer('contextOrderRolesEdit')->comment('Редактирование')->nullable();
            $table->integer('contextOrderRolesCreate')->comment('Создание')->nullable();
            $table->integer('contextOrderRolesDelete')->comment('Удаление')->nullable();

            // Слайдер
            $table->integer('homeCarouselList')->comment('Просмотр слайдер главная')->nullable();
            $table->integer('homeCarouselEdit')->comment('Редактирование слайдер главная')->nullable();
            $table->integer('homeCarouselCreate')->comment('Создание слайдер главная')->nullable();
            $table->integer('homeCarouselDelete')->comment('Удаление слайдер главная')->nullable();

            //Файловый менеджер
            $table->integer('filesManagerList')->comment('Просмотр')->nullable();
            $table->integer('filesManagerEdit')->comment('Редактирование')->nullable();
            $table->integer('filesManagerCreate')->comment('Создание')->nullable();
            $table->integer('filesManagerDelete')->comment('Удаление')->nullable();

            // Сервис коротких ссылок
            $table->integer('shortLinkServiceList')->comment('Просмотр')->nullable();
            $table->integer('shortLinkServiceEdit')->comment('Редактирование')->nullable();
            $table->integer('shortLinkServiceCreate')->comment('Создание')->nullable();
            $table->integer('shortLinkServiceDelete')->comment('Удаление')->nullable();

            // Типы дисконтных карт
            $table->integer('discountCardTypesList')->comment('Просмотр')->nullable();
            $table->integer('discountCardTypesEdit')->comment('Редактирование')->nullable();
            $table->integer('discountCardTypesCreate')->comment('Создание')->nullable();
            $table->integer('discountCardTypesDelete')->comment('Удаление')->nullable();

            // Бонусы
            $table->integer('bonusOperationTypesList')->comment('Просмотр')->nullable();
            $table->integer('bonusOperationTypesEdit')->comment('Редактирование')->nullable();
            $table->integer('bonusOperationTypesCreate')->comment('Создание')->nullable();
            $table->integer('bonusOperationTypesDelete')->comment('Удаление')->nullable();

            // Бонусы
            $table->integer('bonusAccountsList')->comment('Просмотр')->nullable();
            $table->integer('bonusAccountsEdit')->comment('Редактирование')->nullable();
            $table->integer('bonusAccountsCreate')->comment('Создание')->nullable();
            $table->integer('bonusAccountsDelete')->comment('Удаление')->nullable();

            // Анкетирование
            $table->integer('answersQuestionsList')->comment('Просмотр')->nullable();
            $table->integer('answersQuestionsEdit')->comment('Редактирование')->nullable();
            $table->integer('answersQuestionsCreate')->comment('Создание')->nullable();
            $table->integer('answersQuestionsDelete')->comment('Удаление')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('users_admin_roles');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
