class IdStorage<T extends { id: number }>{
	items: Array<T> = []

	add(item: T) : void{
		this.items.push(item);
	}

	remove(id: number) : void{
		this.items = this.items.filter(item => item.id !== id);
	}
}

type TProduct = {
	id: number,
	title: string,
	price: number
}

type TMessage = {
	id: number,
	user_id: number,
	text: string,
	dt: Date
}

type TPostTag = {
	post_id: number,
	tag_id: number
}


let productsStorage = new IdStorage<TProduct>();
let messagesStorage = new IdStorage<TMessage>();
// let ptStorage = new IdStorage<TPostTag>();

let p1: TProduct = { id: 100, title: 'p1', price: 1000 };
let p2: TProduct = { id: 102, title: 'p2', price: 2000 };
let p3: TProduct = { id: 103, title: 'p3', price: 3000 };

let m1: TMessage = { id: 100, user_id: 1, text: 'hi there 1', dt: (new Date()) };
let m2: TMessage = { id: 100, user_id: 1, text: 'hi there 1', dt: (new Date()) };

productsStorage.add(p1);
productsStorage.add(p2);
productsStorage.add(p3);
productsStorage.remove(100);

messagesStorage.add(m1);
messagesStorage.add(m2);

console.log(productsStorage.items);

export default {};