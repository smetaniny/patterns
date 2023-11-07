interface IRouterOptions {
	baseUrl: string,
	routes: RouterRecord[]
}

interface IRouterBaseRecord {
	path: string,
	name?: string
}

interface IRouterComponentRecord extends IRouterBaseRecord {
	i: 'single',
	component: object,
	children?: RouterRecord[],
	/* redirect?: never,
	components?: never */
}

interface IRouterComponentsRecord extends IRouterBaseRecord {
	i: 'multy',
	components: object[],
	children?: RouterRecord[][],
	/* redirect?: never,
	component?: never */
}

interface IRouterRedirectRecord extends IRouterBaseRecord {
	i: 'redirect',
	redirect: string,
	/* component?: never,
	components?: never */
}

type RouterRecord = IRouterComponentRecord | IRouterRedirectRecord | IRouterComponentsRecord;

class Router{
	baseUrl: string;
	routes: object[];

	constructor(options: IRouterOptions){
		this.baseUrl = options.baseUrl;
		this.routes = options.routes;
	}
}

const router = new Router({
	baseUrl: '/',
	routes: [
		{
			i: 'redirect',
			path: '',
			name: 'root',
			redirect: '/home'
		},
		{
			i: 'single',
			path: '/home',
			name: 'home',
			component: {}
		},
		{
			i: "multy",
			path: '/home',
			name: 'home',
			// component: {},
			components: [{}],
			children: [[ { i: 'redirect', path: '/home', redirect: '1' } ]]
		},
		{
			i: 'single',
			path: '/office',
			name: 'office',
			component: {},
			children: [
				{ i: 'single', path: '/home', component: {} }
			]
		}
	]
})

console.log(router);
export default {};