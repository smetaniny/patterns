/* function useNumberState(initial: number) : [ number, (newValue: number) => void ]{
	let value = initial;
	
	function setValue(newValue: number) : void{
		value = newValue;
	}

	return [ value, setValue ];
}

function useStringState(initial: string) : [ string, (newValue: string) => void ]{
	let value = initial;
	
	function setValue(newValue: string) : void{
		value = newValue;
	}

	return [ value, setValue ];
}

function useBooleanState(initial: boolean) : [ boolean, (newValue: boolean) => void ]{
	let value = initial;
	
	function setValue(newValue: boolean) : void{
		value = newValue;
	}

	return [ value, setValue ];
} */
/* 
let [ counter, setCount ] = useNumberState(10);
let [ userName, setUsername ] = useStringState('Admin'); */

/* type InState = number | string | boolean;

function useState(initial: InState) : [ InState, (newValue: InState) => void ]{
	let value = initial;
	
	function setValue(newValue: InState) : void{
		value = newValue;
	}

	return [ value, setValue ];
}

let [ counter, setCount ] = useState(10);
let [ userName, setUsername ] = useState('Admin');

counter + 1;
setCount('dofiga'); */

function useState<T>(initial: T) : [T, (newValue: T) => void ]{
	let value = initial;
	
	function setValue(newValue: T) : void{
		value = newValue;
	}

	return [ value, setValue ];
}

let [ counter, setCount ] = useState(10);
let [ userName, setUsername ] = useState('Admin');
let [ isAdmin, setIsAdmin ] = useState(true);

setIsAdmin(false);

export default {};