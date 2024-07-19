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

interface Tiger extends Cat {
	agressive: boolean
}

type CatKey = keyof Cat;
let a: CatKey = "age";

type CatKeyH = "age" | "voice" | "lifes";
let b: CatKeyH = "voice";

type SafetyAnimal<T, U> = 
	T extends { agressive: boolean } ? 
		U extends { agressive: boolean } ? never : U: 
		T;

type a1 = SafetyAnimal<Cat, Dog>;
type a2 = SafetyAnimal<Dog, Cat>;
type a3 = SafetyAnimal<Dog, Tiger>;

type Ronly<T extends object> = {
	readonly [ K in keyof T ]: T[K]
}

/*
keyof T = Object.keys  
	keyof T -> a | b | c
	Object.keys  [a, b, c]

K in = forEach
	K in (a | b | c) -> 3i 0a 2b 2c
	[a, b, c].forEach -> 3i 0a 2b 2c
*/


/* type RoCat = Ronly<Cat>

let cat1: RoCat = {
	age: 1,
	voice: 'mya',
	lifes: 9
} */

// cat1.lifes--;

/* const aa = { id: 100, title: 'p1', price: 1000 }
type rc1 = Ronly<typeof aa>
 */
const a1 = 'b';

let c = {
	[ a1 ]: 1
}

type WTFUPPER<T extends object> = {
	[ K in keyof T as Uppercase<K & string> ]: T[K]
}

type UpperCat = WTFUPPER<Cat>;


/* type CommonPart<T, U> = {
	[ K in keyof T ]: K extends keyof U ? T[K] : never;
} */

type CommonPart<T, U> = {
	[ K in keyof T as K extends keyof U ? K : never ]: T[K];
}

/*
	Dog, Cat
	keyof U -> 'age' | 'voice' | 'lifes'

	{
		age: number,
		voice: string,
		never: number
	}
*/

type Animal = CommonPart<Dog, Cat>;

type sa = CommonPart<HTMLDivElement, Animation>


export default {}