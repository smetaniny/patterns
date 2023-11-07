type TProduct = {
	id: number,
	price: number,
	rest: number,
	title: string
};

async function getProducts() {
	let response = await fetch('http://faceprog.ru/reactcourseapi/products/all.php');
	let data = await response.json();
	return data as TProduct[];
}

getProducts().then(products => {
	products.forEach(product => {
		console.log(product);
	})
});

export default {};