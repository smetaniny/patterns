type CamelCase<S extends string> = S extends `${infer P1}_${infer P2}${infer P3}`
    ? `${P1}${Uppercase<P2>}${CamelCase<P3>}` : S;

type CamelKeys<T> = {
    [K in keyof T as CamelCase<string & K>]: T[K]
};

type TProduct = { id: number, category_id: number, store_rest_full: number, title: string };

type Product = CamelKeys<TProduct>;

function camelCase(str: string) {
    return str.replace(/[_.-](\w|$)/g, (_, x) => x.toUpperCase());
}

function camelCaseObj(obj: any): any {
    let res: any = {};

    for (let key in obj) {
        res[camelCase(key)] = obj[key];
    }

    return res;
}

function camalize<T>(obj: T): CamelKeys<T> {
    return camelCaseObj(obj);
}

function getFromServer(): TProduct {
    return {id: 1, category_id: 2, store_rest_full: 3, title: 'Hello!'};
}

let productFromServer = camalize(getFromServer());
// productFromServer.


export default {}
