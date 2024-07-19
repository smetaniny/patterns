/* type Product = {
	id: number,
	title: string,
	catgories: number[]
}
 */
/* type ProdDict = {
	[ key: number ]: string
}

let a: ProdDict = {
	1: 'some'
} */

/* 

type prId2Title = Dictionary<Product['id'], Product['title']>
type prT2Id = Dictionary<Product['title'], Product['id']>
type prId2Cat = Dictionary<Product['id'], Product['catgories']>
type prn = Dictionary<Product['catgories'], Product['id']>
 */

type ValidObjKey = number | string | symbol;
type Dictionary<T extends ValidObjKey, U> = {
	[ key in T ]: U
}

export function makeMap<T extends object, K extends keyof T, V extends keyof T>
(data: Array<T>, indexKey: K, valueKey: V) :
T[K] extends ValidObjKey ? Dictionary<T[K], T[V]> : never
{
	let res: any = {};
	data.forEach(item => res[item[indexKey]] = item[valueKey]);
	return res;
}

export function makeAssocMap<T extends object, K extends keyof T>
(data: Array<T>, indexKey: K) :
T[K] extends ValidObjKey ? Dictionary<T[K], T> : never
{
	let res: any = {};
	data.forEach(item => res[item[indexKey]] = item);
	return res;
}