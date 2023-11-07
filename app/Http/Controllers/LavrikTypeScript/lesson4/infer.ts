type ReturnOf<T> = T extends (...args: any[]) => infer R ? R : never;

function a() : number{
	return 1;
}

type ResultOfA = ReturnOf<typeof a>;

type someActions = {
	getUserId: () => number,
	getUserName: () => string
}

type someResults = {
	[ K in keyof someActions ]: ReturnOf<someActions[K]>
}

/* type IsFn<T> = T extends (...args: any[]) => any ? T : never;

function a(){

}

const b = 'hi';

type Ra = IsFn<typeof a>;
type Rb = IsFn<typeof b>; */

type SomeString<T> = T extends `${infer R1} ${infer R2}` ? R2 : T;

const some = 'Hello World !';

type s1 = SomeString<typeof some>;

/*
${infer R1}${infer R2} /^(.)(.*)$/
${infer R1} ${infer R2} /^(.*?) (.*)$/

${infer R1}_${infer R2}${infer R3}
some_other_property

R1 = some
R2 = o
R3 = ther_property

*/

type CamelCase<T> = T extends `${infer R1}_${infer R2}${infer R3}` ? 
							`${R1}${Uppercase<R2>}${CamelCase<R3>}` : 
							T;

type CameKeys<T extends object> = {
	[ K in keyof T as CamelCase<K> ]: T[K]
}

type TDog = {
	age: number,
	voice: string,
	is_agressive: boolean,
	can_find_eat_without_human: boolean
}

type CamelDog = CameKeys<TDog>

type TProduct = { id: number, category_id: number, store_rest_full: number, title: string };

function camelCase<T extends string>(str: T) : CamelCase<T> {
	return str.replace(/[_.-](\w|$)/g, (_, x) => x.toUpperCase()) as CamelCase<T>;
}

function camelKeys<T extends object>(obj: T) : CameKeys<T>{
	let res: any = {};

	for(let key in obj){
		res[camelCase(key)] = obj[key];
	}

	return res;
}

function getFromServer() : TProduct{
	return { id: 1, category_id: 2, store_rest_full: 3, title: 'Hello!' };
}

let product = camelKeys(getFromServer());

/* const h = 'hello_world';
const hc = camelCase(h); */