class Shield {
	resistance: number;
	size: number;

	constructor(resistance: number, size: number){
		this.resistance = resistance;
		this.size = size;
	}
}

abstract class Weapon {
	range: number;
	protected damage: number;

	constructor(range: number, damage: number){
		this.range = range;
		this.damage = damage;
	}
}

class Sword extends Weapon{
	wear: number;

	constructor(range: number, damage: number, wear: number){
		super(range, damage);
		this.wear = wear;
	}
}

class Bow extends Weapon{
	arrows: number;

	constructor(range: number, damage: number, arrows: number){
		super(range, damage);
		this.arrows = arrows;
	}
}

abstract class Unit {
	health: number;
	readonly armor: number;

	constructor(health: number, armor: number){
		this.health = health;
		this.armor = armor;
	}

	abstract canAttack() : boolean;

	getGamage(damage: number) : number{
		this.health -= damage;
		return this.health;
	}
}

class Swordman extends Unit {
	shield?: Shield;
	weapon: Sword

	constructor(health: number, armor: number, weapon: Sword, shield?: Shield){
		super(health, armor);
		this.weapon = weapon;
		this.shield = shield;
	}

	canAttack() : boolean{
		return this.weapon.wear < 100;
	}
}

class Bowman extends Unit {
	private readonly weapon: Bow

	constructor(health: number, armor: number, weapon: Bow){
		super(health, armor);
		this.weapon = weapon;
	}

	canAttack() : boolean{
		return this.weapon.arrows > 0;
	}

	attack(){
		/* this.weapon = new Bow(1, 1, 1); */
		this.weapon.arrows--;
	}
}

let bowman1 = new Bowman(100, 10, new Bow(20, 10, 30));
console.log(bowman1);

/* bowman1.weapon.damage */

/* let unit1 = new Unit(100, 10, new Bow(20, 10));
console.log(unit1); */


export default {};