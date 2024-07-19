import axios from 'axios';
import { Request } from '@/external/requests';

type StringAfter<T extends string, U extends string> = T extends `${U}${infer R}` ? R : never;

const baseURL = 'http://faceprog.ru/tsapi/';
const http = axios.create({
	baseURL,
	timeout: 10000
});

export async function getRequest<T extends Request>(
	url: StringAfter<T['url'], typeof baseURL>,
	params: T['params'] extends object ? T['params'] : {}
) : Promise<T['success']>{
	let { data } = await http.get<T['success']>(url, { params });
	return data;
}