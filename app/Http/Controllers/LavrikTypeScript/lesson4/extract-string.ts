type Some = {
	property: number,
	other: string,
	1: number
}

/* type CapitalizeObject<U extends object> = {
	[ K in keyof U as `${Capitalize<K & string>}`]: U[K]
} */

/* type CapitalizeObject<U extends object> = {
	[ K in keyof U as K extends string ? `${Capitalize<K>}` : never]: U[K]
} */

type CapitalizeObject<U extends object> = {
	[ K in keyof U as K extends string ? `${Capitalize<K>}` : K]: U[K]
}

type CapSome = CapitalizeObject<Some>;