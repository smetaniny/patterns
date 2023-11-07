import { getRequest } from '@/http/index'
import { GetCarCategoriesList, GetPlacesList, GetSchedule } from '@/external/requests'
import { InjectionKey } from 'vue'

interface Api{
	getCarCategories: () => Promise<GetCarCategoriesList['success']>,
	getPlaces: () => Promise<GetPlacesList['success']>,
	getSchedule: (place_id: number) => Promise<GetSchedule['success']>
}

const api: Api = {
	getCarCategories(){
		return getRequest<GetCarCategoriesList>("car-categories/", {});
	},
	getPlaces(){
		return getRequest<GetPlacesList>("places/", {});
	},
	getSchedule(place_id: number){
		return getRequest<GetSchedule>("schedule/", { place_id });
	}
}

export const apiInjectionKey = Symbol() as InjectionKey<Api>;

export default api;