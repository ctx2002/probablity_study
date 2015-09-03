use std::fmt; // Import `fmt`
// Derive the `fmt::Debug` implementation for `Structure`. `Structure`
// is a structure which contains a single `i32`.
#[derive(Debug)]
struct Structure(i32);

// Put a `Structure` inside of the structure `Deep`. Make it printable
// also.
#[derive(Debug)]
struct Deep(Structure);

#[derive(Debug)]
struct MinMax(i64, i64);
impl fmt::Display for MinMax {
    fn fmt(&self, f: &mut fmt::Formatter) -> fmt::Result {
	    write!(f, "({}, {})", self.0, self.1)
	}
}

#[derive(Debug)]
struct Point2 {
    x: f64,
    y: f64,
}

impl fmt::Display for Point2 {
    fn fmt(&self, f: &mut fmt::Formatter) -> fmt::Result {
	    write!(f, "x: {}, y: {}", self.x, self.y)
	}
}



fn main()
{
  let mut v : Vec<f64> = vec![3.4, 2.5, 4.8, 2.9, 3.6,
  2.8, 3.3, 5.6, 3.7, 2.8,
  4.4, 4.0, 5.2, 3.0, 4.8];
  
  println!("hello, world!");
  println!("size: {}", sample_size(&v));
  println!("mean: {}", sample_mean(&v));
  println!("median: {}", sample_median(&mut v));
  
  //Almost everything in Rust is an expression. 
  //An expression is something that returns a value. 
  //If you put a semicolon you are suppressing the 
  //result of this expression, which in most cases is what you want.
  println!("hello");
  // There are various optional patterns this works with. Positional
  // arguments can be used.
  println!("{0}, this is {1}. {1}, this is {0}", "Alice", "Bob");
  
  // As can named arguments.
    println!("{subject} {verb} {predicate}",
             predicate="over the lazy dog",
             subject="the quick brown fox",
             verb="jumps");
			 
    // Special formatting can be specified after a `:`.
    println!("{:?}", (3, 4));
	
	println!("{} of {:b} people know binary, the other half don't", 1, 2);
	
	
	// Printing with `{:?}` is similar to with `{}`.
    println!("{:?} months in a year.", 12);
    println!("{1:?} {0:?} is the {actor:?} name.",
             "Slater",
             "Christian",
             actor="actor's");

    // `Structure` is printable!
    println!("Now {:?} will print!", Structure(3));

    // The problem with `derive` is there is no control over how
    // the results look. What if I want this to just show a `7`?
    println!("Now {:?} will print!", Deep(Structure(7)));
	
	println!("Now {} will print!", MinMax(1, 5));
	let point = Point2 { x: 3.3, y: 7.2 };
	println!("Now {} will print!", point);
}

fn sample_size(sample: &Vec<f64> ) -> usize
{
    return sample.len();   
}

fn sample_mean(sample: &Vec<f64>) -> f64
{
	let s = sample.iter().fold(0.0, |sum, val| sum + *val); 
    let size = 	sample_size(sample);
	
	return s / size as f64;
}

fn sample_median(sample: &mut Vec<f64>)-> f64
{
    let is_even = |x: usize| x & 1 == 0;
	let size: usize = sample_size(sample);
	sample.sort_by(|x,y| x.partial_cmp(y).unwrap() );
	if is_even(size) {
	    return sample[size / 2];
	} else {
	    return ( sample[size/2] + sample[ size/2 + 1] ) / 2.0;
	}
}

