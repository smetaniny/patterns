import { CarCategory, Place, Schedule } from './private'

export interface Request {
  method: 'GET' | 'POST',
  url: string,
  success: unknown,
  params?: object
}

export type GetCarCategoriesList = {
  method: 'GET',
  url: 'http://faceprog.ru/tsapi/car-categories/',
  success: CarCategory[],
}

export type GetPlacesList = {
  method: 'GET',
  url: 'http://faceprog.ru/tsapi/places/',
  success: Place[],
}

export type GetSchedule = {
  method: 'GET',
  url: `http://faceprog.ru/tsapi/schedule/`,
  params: { place_id: number },
  success: Schedule,
}
