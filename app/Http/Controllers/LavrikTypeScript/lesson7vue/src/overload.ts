function makeDate(timestamp: number): Date
function makeDate(m: number, d: number, y: number): Date
function makeDate(mOrTimestamp: number, d?: number, y?: number): Date {
	if (d !== undefined && y !== undefined) {
		return new Date(y, mOrTimestamp, d);
	} else {
		return new Date(mOrTimestamp);
	}
}
const d1 = makeDate(12345678);
const d2 = makeDate(5, 5, 5);
/* const d3 = makeDate(1, 3); */
console.log(d1, d2);

let a = { a: 1 };
let b = { b: 1 };
let c = { c: 1 };
let d = { d: 1 };
let e = { e: 1 };

let res = Object.assign({}, a, b, c, d);

function merge<T, U>(o1: T, o2: U) : T & U
function merge<T, U, V>(o1: T, o2: U, o3: V) : T & U & V
function merge<T, U, V, W>(o1: T, o2: U, o3: V, o4: W) : T & U & V & W
function merge<T, U, V, W, X>(o1: T, o2: U, o3: V, o4: W, o5: X) : T & U & V & W & X
function merge(...args: object[]){
	return Object.assign({}, ...args);
}

let res1 = merge(a, b, c, d, e)