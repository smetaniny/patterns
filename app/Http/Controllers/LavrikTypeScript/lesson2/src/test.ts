/* type one = {
	a: {
	  b: number,
	  q: number,
	  c?: never
	},
	d: number
 }

 type two = {
	a: {
	  c: number
	},
 }

 const t: one | two = {
	a: {
	  c: 1,
	  b: 1,
	  q: 1
	},
	d: 1
 } */

let a: number = 10;

export default a;