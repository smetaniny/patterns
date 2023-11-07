type LazyKey<T extends object, U extends Extract<keyof T, string>> = {
	[ K in keyof T ] : K extends U ? () => T[K] : T[K]
}

function lazyKey<T extends object, U extends Extract<keyof T, string>>(obj: T, targetKey: U) : LazyKey<T, U>{
	let res: any = {};

	for(let k in obj){
		if(targetKey == k){
			let save = obj[k];
			res[k] = () => save;
		}
		else{
			res[k] = obj[k]
		}
	}

	return res;
}

interface Test{
	id: number,
	title: string,
	steps: Array<object>
}

type LazyTest = LazyKey<Test, 'steps'>

let test1: Test = {
	id: 1,
	title: 'First',
	steps: [
		{ titel: 'step1' }, { title: 'step2' }
	]
}

interface BigMap{
	id: number,
	title: string,
	schema: Object[][][]
}

let map1: BigMap = {
	id: 1,
	title: 'Map',
	schema: [
		[ [ { a : 1 } ] ] 
	]
}

let lazyTest = lazyKey(test1, 'steps');
console.log(test1);
console.log(lazyTest);
console.log(lazyTest.steps());

let lazyMap = lazyKey(map1, 'schema');
console.log(map1);
console.log(lazyMap);
console.log(lazyMap.schema());

import './oop';

export default {};


/* keyof T

Extract<keyof T, string>

a

Extract<a, string> */