type TShield = {
	resistance: number,
	size: number
}

type TWeapon = {
	range: number,
	damage: number
}

type TSword = TWeapon & {
	wear: number,
	arrows?: never
}

type TBow = TWeapon & {
	arrows: number,
	wear?: never
}

type TUnit = {
	health: number,
	armor: number,
	shield: TShield | null
}

type TSwordman = TUnit & {
	weapon: TSword
}

type TBowman = TUnit & {
	weapon: TBow,
	shield: null
}

type TWarior = TSwordman | TBowman;

type TGroup = {
	units: TWarior[]
}

let result: TGroup = {
	units: [
		{
			health: 10,
			armor: 2,
			weapon: {
				arrows: 40,
				range: 20,
				damage: 5
			},
			shield: null
		},
		{
			health: 10,
			armor: 2,
			weapon: {
				range: 1,
				damage: 8,
				wear: 0
			},
			shield: null
		},
		{
			health: 10,
			armor: 2,
			weapon: {
				range: 1,
				damage: 8,
				wear: 0
			},
			shield: { resistance: 2, size: 5 }
		}
	]
}

export default result;

/*
type TWeapon = {
	range: 1,
	damage: 5
}

type TSword = TWeapon & {
	wear: 0
}

type TBow = TWeapon & {
	arrows: 30
}
*/
/* 
{
	i: 'redirect',
	path: 'a',
	redirect: '/b'
} */

/* units: new Group([
	new Bowman({
		health: 10,
		armor: 2,
		weapon: new Bow({
			arrows: 40,
			range: 20,
			damage: 5
		}),
		shield: null
	}),
	new Swordman({
		health: 10,
		armor: 2,
		weapon: new Sword({
			range: 1,
			damage: 8,
			wear: 0
		}),
		shield: null
	}),
	new Swordman({
		health: 10,
		armor: 2,
		weapon: new Sword({
			range: 1,
			damage: 8,
			wear: 0
		}),
		shield: new Shield({ resistance: 2, size: 5 })
	})
]) */