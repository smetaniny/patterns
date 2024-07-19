type TShield = {
	resistance: number,
	size: number
}

type TWeapon = {
	range: number,
	damage: number
}

type TSword = TWeapon & {
	i: 'sword',
	wear: number
}

type TBow = TWeapon & {
	i: 'bow',
	arrows: number
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
				i: 'bow',
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
				i: 'sword',
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
				i: 'sword',
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