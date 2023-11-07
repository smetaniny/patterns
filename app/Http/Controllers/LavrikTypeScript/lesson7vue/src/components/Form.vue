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
			<template v-else>
				<AppSelect 
					name="day" 
					label="День" 
					:options="days" 
					:value="day"
					@change="day = $event.toString()"
				/>
				<AppSelect 
					v-if="day !== ''"
					name="time" 
					label="Время" 
					:options="times" 
					:value="time"
					@change="time = $event.toString()"
				/>
			</template>
		</div>
	</div>
</template>

<script setup lang="ts">
	import { apiInjectionKey } from '@/api/index'
	import AppSelect from '@/components/Select.vue'
	import AppLoading from '@/components/Loading.vue'
	import { Ref, ref, computed, watch, inject } from 'vue'
	import { makeMap } from '@/utils/arr'
	import { DateYMDString } from '@/external/private'

	const api = inject(apiInjectionKey)!;
	console.log(api);

	let [ carCategories, places ] = await Promise.all([
		api.getCarCategories(),
		api.getPlaces()
	]);

	let carCategoriesMap = computed(() => makeMap(carCategories, 'id', 'code'));

	let categoryId = ref<string | number>('');
	let categorySelected = computed(() => categoryId.value in carCategoriesMap.value);

	let allowedPlaces = computed(() => places.filter(
		place => place.available_car_category.some(cprice => cprice.car_category_id == categoryId.value)
	));

	let placesMap = computed(() => makeMap(allowedPlaces.value, 'id', 'address'));

	let placeId = ref<string | number>('');
	let placeSelected = computed(() => placeId.value in placesMap.value);

	watch(categoryId, () => {
		if(!placeSelected.value){
			placeId.value = '';
		}
	});

	let schedule: Ref<Awaited<ReturnType<typeof api.getSchedule>> | null> = ref(null);
	let scheduleLoading = computed(() => schedule.value === null && placeSelected.value);

	let days = computed(() => {
		let res: { [ key: string ]: string } = {};
		schedule.value?.days.forEach(day => res[day] = (new Date(day)).toLocaleDateString());
		return res;
	});
	let day = ref('');

	let times = computed(() => {
		let res: { [ key: string ]: string } = {};
		schedule.value?.times[day.value as DateYMDString]?.forEach(time => res[time] = time);
		return res;
	});
	let time = ref('');
	
	watch(placeId, async () => {
		if(placeSelected.value){
			schedule.value = null;
			schedule.value = await api.getSchedule(+placeId.value);
		}
	});

</script>