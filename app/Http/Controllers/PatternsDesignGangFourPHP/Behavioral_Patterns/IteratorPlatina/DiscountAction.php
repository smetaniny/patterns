<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Behavioral_Patterns\IteratorPlatina;

use App\Models\BonusOperationRules;
use App\Models\Certificate;
use App\Models\DiscountCards;
use App\Models\Products;
use App\Models\ProductsData;
use App\Models\Stock;
use App\Models\StockCondition;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class DiscountAction implements Action
{
    public function apply(ProductsData $productsData)
    {
        //Переменные для акции два по цене одного
        $saleOneCount = 0;
        $saleOneSum = 0;
        $saleMinPrice = null;
        $saleOnePrize = null;
        // Доступный бонусный баланс пользователя
        $bonusesBalance = 0;
        // Сколько максимально можно списать, далее участвует в расчетах
        $sumBonus = 0;

        $birthday = false;
        $discount_card_types_id = 1;
        $user = User::findOrFail(9525);
        $paymentMethod = 'online';
        $deliveryIsFitting = '1';
        $flagBonusesPromoCod = 'bonuses';
        $input = [];
        $productsData->action_id = null;
        $productsData->condition_id = null;
        $productsData->card_discount = null;
        $productsData->card_price = null;
        $productsData->stocksName = null;
        $productsData->stocksConditionName = null;
        $productsData->notPromoCode = false;


        if ($user !== null) {
            //Получаем днюху юзера в этом году
            if ($user->date_of_birth !== null) {
                $Y = date("Y");
                $birthday = Carbon::createFromFormat('Y-m-d h:i:s', $Y . '-' . date("m-d", strtotime($user->date_of_birth)) . ' 00:00:00');
            }

            // Получаем группу карты юзера
            $discountCard = DiscountCards::where('id', '=', $user->card_number)->first();
            if ($discountCard !== null) {
                $discount_card_types_id = $discountCard->discount_card_types_id;
                $bonusesBalance = (int) $discountCard->sum_bonus;
            }
        }

        //получаем группу оплаты по методу оплаты
        if ($paymentMethod === 'online') {
            $payment_group_id = 2;
        } else {
            $payment_group_id = 0;
        }


        //Расчет не на чек
        $stockConditionsNoCheks = StockCondition::leftJoin('stocks', 'stocks_conditions.stocks_id', '=', 'stocks.id')->where([
            ['activity', '=', 1],
            ['on_check', '=', 0],
        ])->where(function ($query) {
            $query->orWhere('date_start', '<=', date("Y-m-d h:i:s"));
            $query->orWhere('date_start', null);
        })->where(function ($query) {
            $query->orWhere('date_end', '>=', date("Y-m-d h:i:s"));
            $query->orWhere('date_end', null);
        })->select(
            'stocks.*',
            'stocks_conditions.*',
            'stocks.action_group_id as action_group_id',
            'stocks_conditions.action_group_id as action_group_id_on_check'
        )->get();

        //Пробегаемся по товарам и делаем скидки
        foreach ($stockConditionsNoCheks as $stock) {
            //проверим условие группы товаров в чеке
            $flagAction = false;
            if ($stock->action_group_id_on_check === 0) {
                $flagAction = true;
            } else if ($stock->action_group_id_on_check !== 0) {
                foreach ($productsData as $item) {
                    //Если в корзине есть, хоть один товар из action_group_id_on_check, то все ок
                    $productAction = explode(',', $item->action);
                    if (in_array($stock->action_group_id_on_check, $productAction)) {
                        $flagAction = true;
                        break;
                    }
                }
            }

            if (
                (
                    (bool) $flagAction === true
                ) &&
                //Если свич на оплату равен 0, то проходим дальше, иначе проверяем оплату
                (
                    $stock->payment_group_id === 0 || $stock->payment_group_id === $payment_group_id
                ) &&
                //Если свич на день рождение равен 0, то проходим дальше, иначе проверяем период
                (
                    $stock->card_discount_birthday === 0 || $birthday !== false &&
                    (Carbon::today()->subDays($stock->card_discount_birthday_before) <= $birthday) &&
                    (Carbon::today()->addDays($stock->card_discount_birthday_after) >= $birthday)
                ) &&
                //Если свич на карту равен 0, то проходим дальше, иначе проверяем карту юзера
                (
                    $stock->card_discount_group_id === 0 || $stock->card_discount_group_id === $discount_card_types_id
                )
            ) {
                foreach ($productsData as $k => $v) {
                    $productAction = explode(',', $v->action);
                    if (in_array($stock->action_group_id, $productAction)) {
                        if ($stock->discount >= $v->card_discount) {
                            $v->action_id = $stock->action_id;
                            $v->condition_id = $stock->condition_id;
                            $v->card_discount = $stock->discount;
                            $v->card_price = (int) round($v->price - ($stock->discount * $v->price / 100));
//                            $v->date_end_stock = $stock->date_end;
                            $v->stocksName = $stock->name;
                            $v->stocksConditionName = $stock->condition_name;
                        }
                    }
                }
            }
        }

        //Если выбрана доставка с примеркой скидки на чек не расчитываются!
        if ($deliveryIsFitting !== '1') {
            //Расчет на чек!
            $stockConditions = StockCondition::with(['stockTovarCondition', 'stockTovarResults'])
                ->leftJoin('stocks', 'stocks_conditions.stocks_id', '=', 'stocks.id')->where([
                    ['activity', '=', 1],
                    ['on_check', '=', 1],
                ])->where(function ($query) {
                    $query->orWhere('date_start', '<=', date("Y-m-d h:i:s"));
                    $query->orWhere('date_start', null);
                })->where(function ($query) {
                    $query->orWhere('date_end', '>=', date("Y-m-d h:i:s"));
                    $query->orWhere('date_end', null);
                })->select(
                    'stocks.*',
                    'stocks_conditions.*',
                    'stocks_conditions.action_group_id as action_group_id_on_check'
                )->get();

            foreach ($stockConditions as $stock) {

                //проверим условие группы товаров в чеке
                $flagAction = false;
                if ($stock->action_group_id_on_check === 0) {
                    $flagAction = true;
                } else if ($stock->action_group_id_on_check !== 0) {
                    foreach ($productsData as $item) {
                        $productAction = explode(',', $item->action);
                        if (in_array($stock->action_group_id_on_check, $productAction)) {
                            $flagAction = true;
                            break;
                        }
                    }
                }

                if (
                    (
                        (bool) $flagAction === true
                    ) &&
                    //Если свич на оплату равен 0, то проходим дальше, иначе проверяем оплату
                    (
                        $stock->payment_group_id === 0 || $stock->payment_group_id === $payment_group_id
                    ) &&
                    //Если свич на день рождение равен 0, то проходим дальше, иначе проверяем период
                    (
                        $stock->card_discount_birthday === 0 ||
                        (Carbon::today()->subDays($stock->card_discount_birthday_before) <= $birthday) &&
                        (Carbon::today()->addDays($stock->card_discount_birthday_after) >= $birthday)
                    ) &&
                    //Если свич на карту равен 0, то проходим дальше, иначе проверяем карту юзера
                    (
                        $stock->card_discount_group_id === 0 || $stock->card_discount_group_id === $discount_card_types_id
                    )
                ) {
                    //Если товары-условия не пустые
                    if (!$stock->stockTovarCondition->isEmpty()) {
                        //Если свич на акции равен 0, то проходим дальше, иначе проверяем на акции в товаре
                        $res = true;
                        foreach ($stock->stockTovarCondition as $cond) {
                            $flagActionCount = $productsData->map(function ($item) use ($cond) {
                                $productAction = explode(',', $item->action);
                                if (in_array($cond->action_group_id, $productAction) && $item->kol > 0) {
                                    return $item;
                                }
                            })->reject(function ($name) {
                                return empty($name);
                            })->count();

                            if ($flagActionCount < $cond->quantity) {
                                $res = false;
                                break;
                            }
                        }

                        if (!$res) {
                            continue;
                        } else {
                            //Если есть товары-результаты, то просчитываем их
                            if (!$stock->stockTovarResults->isEmpty()) {
                                foreach ($stock->stockTovarResults as $resTov) {
                                    $cnt = 0;
                                    foreach ($productsData as $k_prod => $prod) {
                                        $productAction = explode(',', $prod->action);
                                        if (in_array($resTov->action_group_id, $productAction) && $prod->kol > 0) {
                                            $cnt++;
                                            if ($cnt <= $resTov->quantity) {
                                                if ($stock->discount >= $prod->card_discount) {
                                                    $prod->action_id = $stock->action_id;
                                                    $prod->condition_id = $stock->condition_id;
                                                    $prod->card_discount = $stock->discount;
                                                    $prod->card_price = (int) round($prod->price - ($stock->discount * $prod->price / 100));
//                                                    $prod->date_end_stock = $stock->date_end;
                                                    $prod->stocksName = $stock->name;// . ' — на чек';
                                                    $prod->stocksConditionName = $stock->condition_name;
                                                }
                                            }
                                        }
                                    }
                                }
                                //Иначе просчитываем всю корзину
                            } else {
                                $productsData = $productsData->each(function ($prod) use ($stock) {
                                    if ($stock->discount >= $prod->card_discount) {
                                        $prod->action_id = $stock->action_id;
                                        $prod->condition_id = $stock->condition_id;
                                        $prod->card_discount = $stock->discount;
                                        $prod->card_price = (int) round($prod->price - ($stock->discount * $prod->price / 100));
//                                        $prod->date_end_stock = $stock->date_end;
                                        $prod->stocksName = $stock->name;// . ' — на чек на все товары, товары-условия - есть, товары-результаты - нет';
                                        $prod->stocksConditionName = $stock->condition_name;
                                    }
                                });
                            }
                        }
                        //Если товары-условия пустые, применяем скидку ко всем товарам-условиям или на всю корзину, если она больше действующей и подошла группа
                    } else {
                        //Если есть товары-результаты, то просчитываем их
                        if (!$stock->stockTovarResults->isEmpty()) {
                            foreach ($stock->stockTovarResults as $resTov) {
                                $cnt = 0;
                                foreach ($productsData as $k_prod => $prod) {
                                    $productAction = explode(',', $prod->action);
                                    if (in_array($resTov->action_group_id, $productAction)) {
                                        $cnt++;
                                        if ($cnt <= $resTov->quantity) {
                                            if ($stock->discount >= $prod->card_discount) {
                                                $prod->action_id = $stock->action_id;
                                                $prod->condition_id = $stock->condition_id;
                                                $prod->card_discount = $stock->discount;
                                                $prod->card_price = (int) round($prod->price - ($stock->discount * $prod->price / 100));
//                                                $prod->date_end_stock = $stock->date_end;
                                                $prod->stocksName = $stock->name;// . ' — на чек на все товары, товары-условия - нет, товары-результаты - есть';
                                                $prod->stocksConditionName = $stock->condition_name;
                                            }
                                        }
                                    }
                                }
                            }
                            //Иначе просчитываем всю корзину
                        } else {
                            $productsData = $productsData->each(function ($prod) use ($stock) {
                                if ($stock->discount >= $prod->card_discount) {
                                    $prod->action_id = $stock->action_id;
                                    $prod->condition_id = $stock->condition_id;
                                    $prod->card_discount = $stock->discount;
                                    $prod->card_price = (int) round($prod->price - ($stock->discount * $prod->price / 100));
//                                    $prod->date_end_stock = $stock->date_end;
                                    $prod->stocksName = $stock->name;// . ' — на чек на все товары, товары-условия - нет, товары-результаты - нет';
                                    $prod->stocksConditionName = $stock->condition_name;
                                }
                            });
                        }
                    }
                } else {
                    continue;
                }
            }

            // Получаем акцию 2 = 1 созданную в админке
            $saleOnePrize = Stock::where([
                ['sale_tip', 2],
            ])->where(function ($query) {
                $query->orWhere('published_start', '<=', date("Y-m-d"));
                $query->orWhere('published_start', null);
            })->where(function ($query) {
                $query->orWhere('published_end', '>=', date("Y-m-d"));
                $query->orWhere('published_end', null);
            })->select(
                'name',
                'published_end',
                'action_id',
                'action_group_id',
                'sale_tip',
                'name_product_one',
                'bg_color_one',
                'name_product_two',
                'bg_color_two',
                'text_warning'
            )->orderBy('id', 'desc')->first();

            if ($saleOnePrize !== null) {
                foreach ($productsData as $product) {
                    // Узнаем сколько товаров в корзине подходят под акцию 2 = 1
                    $productAction = explode(',', $product->action);
                    if (in_array($saleOnePrize->action_group_id, $productAction) && $product->kol > 0) {
                        $saleOneCount++;
                        $saleOneSum = $saleOneSum + $product->price;
                        // Минимальный продукт по цене участвующий в акции
                        if ($product->price < $saleMinPrice || $saleMinPrice === null) {
                            $saleMinPrice = $product->price;
                        }
                    }
                }
                if ($saleOneCount !== 2) {
                    $saleMinPrice = null;
                }
            }
            if ($saleOneCount === 2) {
                $saleOneDiscount = $saleMinPrice * 100 / $saleOneSum;
                $productsData = $productsData->map(function ($item) use ($saleOnePrize, $saleOneDiscount) {
                    // Меняем информацию у нужных элементов
                    $productAction = explode(',', $item->action);
                    if (in_array($saleOnePrize->action_group_id, $productAction) && $item->kol > 0) {
                        $item->action_id = $saleOnePrize->action_id;
                        $item->condition_id = null;
                        $item->card_discount = round($saleOneDiscount, 2);
                        $item->card_price = (int) round($item->price - ($saleOneDiscount * $item->price / 100));
//                        $item->date_end_stock = $saleOnePrize->published_end;
                        $item->stocksName = $saleOnePrize->name;
                        $item->stocksConditionName = $saleOnePrize->name_product_one . ' | ' . $saleOnePrize->name_product_two;
                        $item->notPromoCode = true;
                    }
                    return $item;
                });
            }
            $this->saleHelp['saleOneCount'] = $saleOneCount;
            $this->saleHelp['textWarning'] = $saleOnePrize === null ? null : $saleOnePrize->text_warning;
        }

        //Получаем акцию онлайн оплаты созданную в админке
        $saleOnline = Stock::where([
            ['sale_tip', 1],
        ])->where(function ($query) {
            $query->orWhere('published_start', '<=', date("Y-m-d"));
            $query->orWhere('published_start', null);
        })->where(function ($query) {
            $query->orWhere('published_end', '>=', date("Y-m-d"));
            $query->orWhere('published_end', null);
        })->select('sale_discount')->orderBy('sale_discount', 'desc')->first();
        $this->saleHelp['onlineDiscount'] = $saleOnline === null ? 0 : $saleOnline->sale_discount;

        // Получаем акцию СБП созданную в админке
        $saleSbp = Stock::where([
            ['sale_tip', 3],
        ])->where(function ($query) {
            $query->orWhere('published_start', '<=', date("Y-m-d"));
            $query->orWhere('published_start', null);
        })->where(function ($query) {
            $query->orWhere('published_end', '>=', date("Y-m-d"));
            $query->orWhere('published_end', null);
        })->select('sale_discount')->orderBy('sale_discount', 'desc')->first();
        $this->saleHelp['onlineDiscountSbp'] = $saleSbp === null ? 0 : $saleSbp->sale_discount;

        // Получаем акцию "Оплата в кредит" созданную в админке
        $saleCreditSber = Stock::where([
            ['sale_tip', 4],
        ])->where(function ($query) {
            $query->orWhere('published_start', '<=', date("Y-m-d"));
            $query->orWhere('published_start', null);
        })->where(function ($query) {
            $query->orWhere('published_end', '>=', date("Y-m-d"));
            $query->orWhere('published_end', null);
        })->select('sale_discount')->orderBy('sale_discount', 'desc')->first();
        $this->saleHelp['onlineDiscountCreditSber'] = $saleCreditSber === null ? 0 : $saleCreditSber->sale_discount;

        //Получаем акцию по подаркам созданную в админке
        $saleGift = Stock::where([
            ['sale_tip', 5],
        ])->where(function ($query) {
            $query->orWhere('published_start', '<=', date("Y-m-d"));
            $query->orWhere('published_start', null);
        })->where(function ($query) {
            $query->orWhere('published_end', '>=', date("Y-m-d"));
            $query->orWhere('published_end', null);
        })->select('id', 'alias', 'sale_discount', 'text_warning')->orderBy('id', 'desc')->first();
        $this->saleHelp['saleGift'] = $saleGift === null ? false : true;
        if ($saleGift !== null) {
            $saleGiftProduct = Products::where('id', $saleGift->sale_discount)
                ->select(
                    'article',
                    'h1',
                    'imgBasic',
                    'collection',
                )->first();

            if ($saleGiftProduct !== null) {
                $this->saleHelp['saleGiftData']['article'] = $saleGiftProduct->article;
                $this->saleHelp['saleGiftData']['title'] = $saleGiftProduct->h1;
                $this->saleHelp['saleGiftData']['imgUrl'] = $saleGiftProduct->imgBasic;
                $this->saleHelp['saleGiftData']['imgUrlWebp'] = str_replace(".png", ".webp", $saleGiftProduct->imgBasic);
                $this->saleHelp['saleGiftData']['collectionName'] = $saleGiftProduct->collection;
            }
            $this->saleHelp['saleGiftData']['link'] = '/stocks/' . $saleGift->alias;
            $linkText = explode('|', $saleGift->text_warning);
            $this->saleHelp['saleGiftData']['linkTextOne'] = array_shift($linkText);
            $this->saleHelp['saleGiftData']['linkTextTwo'] = array_shift($linkText);

        }

        // START Расчет начисления бонусов
        if (!empty($discount_card_types_id)) {

            //Получаем сумму бонусов к начислению за онлайн - пока просто запись с максимальным значением
            $bonusOperationRulesAddOnline = BonusOperationRules::leftJoin('bonus_operation_types', 'bonus_operation_rules.bonus_operation_types_id', '=', 'bonus_operation_types.id')->where([
                ['bonus_operation_names_id', '=', 8],
                ['activity', '=', 1],
                ['vid_operation', '=', '+'],
            ])->select('sum_percent')->orderBy('sum_percent', 'desc')->first();
            $this->saleHelp['onlineBonusesAdd'] = $bonusOperationRulesAddOnline === null ? 0 : $bonusOperationRulesAddOnline->sum_percent;

            // Ищем правила начислений бонусов
            $bonusOperationRulesAdd = BonusOperationRules::leftJoin('bonus_operation_types', 'bonus_operation_rules.bonus_operation_types_id', '=', 'bonus_operation_types.id')->where([
                ['bonus_operation_names_id', '=', 2],
                ['activity', '=', 1],
                ['vid_operation', '=', '+'],
            ])->select(
                'bonus_operation_rules.*',
                'bonus_operation_rules.name as name',
            )->get();

            // Ищем правила списаний бонусов
            $bonusOperationRulesSubtract = BonusOperationRules::leftJoin('bonus_operation_types', 'bonus_operation_rules.bonus_operation_types_id', '=', 'bonus_operation_types.id')->where([
                ['bonus_operation_names_id', '=', 2],
                ['activity', '=', 1],
                ['vid_operation', '=', '-'],
            ])->select(
                'bonus_operation_rules.*',
                'bonus_operation_rules.name as name',
            )->get();

            $resSubtract = [];
            $resAdd = [];

            // Массив акционных групп у товаров
            $productActionGroup = explode(',', $productsData->action);
            // От какой суммы рассчитываем
            $price = $productsData->card_price !== null ? $productsData->card_price : $productsData->price;
            // Начисление
            if (!$bonusOperationRulesAdd->isEmpty()) {
                $sumPercent = 0;
                foreach ($bonusOperationRulesAdd as $v_rules) {
                    if ($v_rules->discount_card_types_id === null || $v_rules->discount_card_types_id === $discount_card_types_id) {
                        if ($v_rules->action_group_id === 0 || in_array($v_rules->action_group_id, $productActionGroup)) {
                            $sumPercent = $sumPercent < $v_rules->sum_percent ? $v_rules->sum_percent : $sumPercent;
                        }
                    }
                }
                // Максимально возможная сумма начисления
                $productsData->bonusesAdd = round(($price * $sumPercent) / 100);
                if ($productsData->bonusesAdd !== 0) {
                    array_push($resAdd, $productsData->bonusesAdd);
                }
            }

            // Списание
            if ($flagBonusesPromoCod === 'bonuses') { // Если флаг на бонусах
                if (!$bonusOperationRulesSubtract->isEmpty()) {
                    $sumPercentSubtract = 100;
                    foreach ($bonusOperationRulesSubtract as $v_rules) {
                        if ($v_rules->discount_card_types_id === null || $v_rules->discount_card_types_id === $discount_card_types_id) {
                            if ($v_rules->action_group_id === 0 || in_array($v_rules->action_group_id, $productActionGroup)) {
                                $sumPercentSubtract = $sumPercentSubtract > $v_rules->sum_percent ? $v_rules->sum_percent : $sumPercentSubtract;
                            }
                        }
                    }
                    $sumPercentSubtract = $sumPercentSubtract === 100 ? 0 : $sumPercentSubtract;
                    // Максимально возможная сумма списания
                    $productsData->maxSumSubtract = round(($price * $sumPercentSubtract) / 100);
                    if ($productsData->maxSumSubtract != 0) {
                        array_push($resSubtract, $productsData->maxSumSubtract);
                    }
                }
            }

            $productsData->totalBonusesAdd = array_sum($resAdd);
            $productsData->maximumSubtractBonuses = array_sum($resSubtract);

            $sumBonus = min($bonusesBalance, $productsData->maximumSubtractBonuses);
        }

        // END Расчет начисления бонусов
        $countProductsData = $productsData->count();
        $newBonusesSubtract = collect([]);
        $productsDataAll = [];

        $productsDataAll['id'] = $productsData->product_data_id;
        $productsDataAll['guid'] = $productsData->guid;
        $productsDataAll['count'] = $productsData->count;
        $productsDataAll['insert'] = $productsData->insert;
        $productsDataAll['kol'] = $productsData->kol;
        $productsDataAll['price'] = $productsData->price;
        $productsDataAll['product_data_shop'] = $productsData->product_data_shop;
        $productsDataAll['product_id'] = $productsData->product_id;
        $productsDataAll['razmer'] = $productsData->razmer;
        $productsDataAll['ves'] = $productsData->ves;
        $productsDataAll['created_at'] = $productsData->created_at;
        $productsDataAll['updated_at'] = $productsData->updated_at;
        // Бонусы, начисление
        $productsDataAll['bonusesAdd'] = isset($productsData->bonusesAdd) ? $productsData->bonusesAdd : 0;
        // Бонусы, списание
        $productsDataAll['currentBonusSubtractPercent'] = isset($el->maxSumSubtract) && $productsData->maximumSubtractBonuses != 0 ? $el->maxSumSubtract * 100 / $productsData->maximumSubtractBonuses : 0;
        $productsDataAll['bonusesSubtract'] = $sumBonus - $newBonusesSubtract->sum();
        $productsDataAll['action_id'] = isset($productsData->action_id) ? $productsData->action_id : null;
        $productsDataAll['condition_id'] = isset($productsData->condition_id) ? $productsData->condition_id : null;
        $productsDataAll['card_discount'] = $productsData->card_discount;
        $productsDataAll['card_price'] = isset($productsData->card_discount) ? $productsData->card_price : $productsData->price;
        $productsDataAll['stocksName'] = $productsData->stocksName;
        $productsDataAll['notPromoCode'] = $productsData->notPromoCode;



        // Дополнительная информация по бонусам
        // Общая максимальная сумма начисления
        $this->bonuses['totalBonusesAdd'] = isset($productsData->totalBonusesAdd) ? $productsData->totalBonusesAdd : 0;
        $this->bonuses['productsBonusesAdd'] = isset($productsData->totalBonusesAdd) ? $productsData->totalBonusesAdd : 0;
        // Максимально возможная сумма списания
        $this->bonuses['maximumSubtractBonuses'] = $sumBonus;
        // Бонусный баланс пользователя
        $this->bonuses['bonusesBalance'] = $bonusesBalance;


        return $productsData;
    }
}
