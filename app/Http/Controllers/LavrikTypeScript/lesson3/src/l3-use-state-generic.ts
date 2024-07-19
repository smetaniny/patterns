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
