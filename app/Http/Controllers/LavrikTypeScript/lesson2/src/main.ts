interface TShield {
	resistance: number,
	size: number
}

interface TWeapon {
	range: number,
	damage: number
}

interface TSword extends TWeapon {
	wear: number,
	arrows?: never
}

interface TBow extends TWeapon {
	arrows: number,
	wear?: never
}

interface TUnit {
	health: number,
	armor: number,
	shield: TShield | null
}

interface TSwordman extends TUnit {
	weapon: TSword
}

interface TBowman extends TUnit {
	weapon: TBow,
	shield: null
}

type TWarior = TSwordman | TBowman;

interface TGroup {
	units: TWarior[]
}

class Bow implements TBow{
	range: number;
	damage: number;
	arrows: number;

	constructor(range: number, damage: number, arrows: number){
		this.range = range;
		this.damage = damage;
		this.arrows = arrows;
	}
}

let result: TGroup = {
	units: [
		{
			health: 10,
			armor: 2,
			weapon: new Bow(10, 20, 30),
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


console.log(result);

export default result;