type A = {
	a: number,
	b: number,
	c?: never
}

type B = {
	a?: never,
	b: number,
	c: number
}

type AB = A | B;

let box: AB[] = [];

box.push({ a: 1, b: 2 });
box.push({ b: 1, c: 2 });

interface C {
	a: number,
	b: number,
	c?: never
}

interface D {
	a?: never,
	b: number,
	c: number
}

let ibox: Array<C | D> = [];

ibox.push({ a: 1, b: 2 });
ibox.push({ b: 1, c: 2 });
/*
type some = number | BigInt; */

interface Cat {
	age: number,
	voice: string,
	lifes: number
}

interface Dog {
	age: number,
	voice: string,
	agressive: boolean
}

interface Kotopes extends Cat, Dog {

}

let cd: Kotopes = { age: 10, voice: 'gaoumay', lifes: 9, agressive: false };

type TCat = {
	age: number,
	voice: string,
	lifes: number
}

type TDog = {
	age: number,
	voice: string,
	agressive: boolean
}

type TKotopes = TCat & TDog;

let cdt: TKotopes = { age: 10, voice: 'gaoumay', lifes: 9, agressive: false };

export default {};
