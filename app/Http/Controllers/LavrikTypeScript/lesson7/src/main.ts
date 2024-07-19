import { Loader } from 'google-maps';
 
type sample = Array<number | pool>;
type pool = {
	values: sample
}

let box: sample = [
	2,
	3,
	{ values: [ 5 ] },
	4,
	{ 
		values: [ 
			5, 
			6, 
			{ 
				values: [1, 4] 
			}
	] },
]


let flat = flatBox(box);
console.log(flat);

function flatBox(box: sample){
	let flatbox: number[] = [];

	box.forEach(item => {
		if(typeof item === 'number'){
			flatbox.push(item);
		}
		else{
			flatBox(item.values).forEach(inner => flatbox.push(inner));
		}
	});

	return flatbox;
}


let a = { values: [1, 2] }
let b = { value: [1, 2] }
let c = { a: 1 }

function isPool(item: any) : item is pool{
	return 'values' in item;
}

if(isPool(a)){
	console.log(a);
}

if(isPool(b)){
	console.log(b);
}

if(isPool(c)){
	console.log(c);
}


/* function flatBox(box: sample){
	let flatbox: number[] = [];

	box.forEach(item => {
		if(typeof item === 'object' && 'values' in item){
			flatBox(item.values).forEach(inner => flatbox.push(inner));
		}
		else{
			flatbox.push(item);
		}
	});

	return flatbox;
} */



let runMap = async () => {
	const loader = new Loader('');

	const google = await loader.load();
	const center: google.maps.LatLngLiteral = { lat: -34.397, lng: 150.644 };
	const deliveryOffset = 0.1;
	const btnAddDelivery = document.querySelector('.app-add-delivery-zone') as HTMLButtonElement;
	const btnSave = document.querySelector('.app-save') as HTMLButtonElement;
	const resultMarker = document.querySelector('.app-sample-result-marker')!;
	const resultDelivery = document.querySelector('.app-sample-result-delivery')!;

	const map = new google.maps.Map(document.querySelector('.map') as HTMLElement, {
		center,
		zoom: 8,
	});

	let marker: google.maps.Marker | null = null;
	let deliveryZone: google.maps.Polygon | null = null;

	map.addListener('click', function(e){
		if(marker === null){
			marker = new google.maps.Marker({
				position: e.latLng,
				draggable: true,
				map
			});

			let currentPosition = e.latLng.toJSON();

			marker.addListener<'dragstart'>('dragstart', function(){
				let pos = this.getPosition();

				if(pos){
					currentPosition = pos.toJSON();
				}
			});

			marker.addListener<'dragend'>('dragend', function(e){
				let pos = this.getPosition();

				if(pos){
					transferDeliveryPolygon(
						currentPosition.lat - pos.lat(),
						currentPosition.lng - pos.lng()
					);
				}
			});

			btnAddDelivery.disabled = false;
			btnSave.disabled = false;
		}
		
	})

	function transferDeliveryPolygon(dx: number, dy: number): void{
		if(deliveryZone instanceof google.maps.Polygon){
			deliveryZone.setPath(
				deliveryZone.getPath().getArray().map(item => {
					let remap = item.toJSON();
					remap.lat -= dx;
					remap.lng -= dy;
					return remap;
				})
			)
		}
	}

	btnAddDelivery.addEventListener('click', function(){
		if(deliveryZone === null && marker !== null){
			let center = marker.getPosition();

			if(center instanceof google.maps.LatLng){
				let lat = center.lat();
				let lng = center.lng();

				deliveryZone = new google.maps.Polygon({
					paths: [
						{ lat: lat - deliveryOffset, lng: lng - deliveryOffset },
						{ lat: lat + deliveryOffset, lng: lng - deliveryOffset },
						{ lat: lat + deliveryOffset, lng: lng + deliveryOffset },
						{ lat: lat - deliveryOffset, lng: lng + deliveryOffset }
					],
					fillColor: 'red',
					fillOpacity: 0.3,
					strokeWeight: 1,
					editable: true,
					map
				});
			}
		}
	});

	btnSave.addEventListener('click', function(){
		if(marker instanceof google.maps.Marker){
			let center = marker.getPosition();

			if(center instanceof google.maps.LatLng){
				resultMarker.innerHTML = `Cafe places in: ${center.lat()}, ${center.lng()}`;
			}
		}

		if(deliveryZone instanceof google.maps.Polygon){
			let coords = deliveryZone.getPath().getArray().map(item => item.toJSON())
			resultDelivery.innerHTML = `Polygon delivery in: ${JSON.stringify(coords)}`;
		}
	});
	
}

// runMap();