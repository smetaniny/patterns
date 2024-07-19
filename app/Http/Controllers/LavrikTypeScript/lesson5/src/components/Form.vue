<template>
	<div>
		<AppSelect 
			name="car_category_id" 
			label="Категории ТС" 
			:options="carCategoriesMap" 
			:value="categoryId"
			@change="categoryId = $event"
		/>
		<AppSelect 
			v-if="categorySelected"
			name="place_id" 
			label="Пункт ТО" 
			:options="placesMap" 
			:value="placeId"
			@change="placeId = $event"
		/>
		<div v-if="placeSelected">
			<AppLoading v-if="scheduleLoading" />
			<pre v-else>
				{{ schedule }}
			</pre>
		</div>
	</div>
</template>

<script setup lang="ts">
	import { getRequest } from '@/http/index'
	import { GetCarCategoriesList, GetPlacesList, GetSchedule } from '@/external/requests'
	import AppSelect from '@/components/Select.vue'
	import AppLoading from '@/components/Loading.vue'
	import { Ref, ref, computed, watch } from 'vue'

	let [ carCategories, places ] = await Promise.all([
		getRequest<GetCarCategoriesList>("car-categories/", {}),
		getRequest<GetPlacesList>("places/", {})
	]);

	let carCategoriesMap = computed(() => {
		let map: { [ key: string | number ]: string } = {};
		carCategories.forEach(category => map[category.id] = category.code);
		return map;
	});

	let categoryId = ref<string | number>('');
	let categorySelected = computed(() => categoryId.value in carCategoriesMap.value);

	let allowedPlaces = computed(() => places.filter(
		place => place.available_car_category.some(cprice => cprice.car_category_id == categoryId.value)
	));

	let placesMap = computed(() => {
		let map: { [ key: string | number ]: string } = {};
		allowedPlaces.value.forEach(place => map[place.id] = place.address);
		return map;
	});

/* 	function makeMap<T, K extends keyof T, V extends keyof T>(data: Array<T>, key: K, valueKey: V){
		
	}

	makeMap<Place>(places, 'id', 'address')
	makeMap<CarCategory>(cat, 'id', 'code') */

	let placeId = ref<string | number>('');
	let placeSelected = computed(() => placeId.value in placesMap.value);

	watch(categoryId, () => {
		if(!placeSelected.value){
			placeId.value = '';
		}
	});

	let schedule: Ref<GetSchedule['success'] | null> = ref(null);
	let scheduleLoading = computed(() => schedule.value === null && placeSelected.value);

	watch(placeId, async () => {
		if(placeSelected.value){
			schedule.value = null;
			schedule.value = await getRequest<GetSchedule>("schedule/", {
				place_id: +placeId.value
			});
		}
	});
</script>