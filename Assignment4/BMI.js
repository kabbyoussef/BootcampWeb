

//A
var height_L=1.69,height_P=1.95,mass_L=78,mass_P=92,BMI_L,BMI_P;
BMI_P=(mass_P/(height_P*height_P)).toFixed(2);
BMI_L=(mass_L/(height_L*height_L)).toFixed(2);

var lucasHigherBMI=(BMI_P>BMI_L);

console.log("The BMI of Petter is "+ BMI_P);
console.log("The BMI of Lucas is "+BMI_L);
console.log("Petter’s BMI is higher than Lucas’s BMI that is "+lucasHigherBMI);
//B
var celsius=38;
var fahrenheit= (celsius* 1.8) + 32 
console.log(celsius+"C is "+fahrenheit+"F");
fahrenheit= 32;
celsius= (fahrenheit - 32) * 0.5556;

console.log(fahrenheit+"F is "+celsius+"C");
//C
if(BMI_L>BMI_P){
    console.log("Lucas' BMI (%d) is higher than Peter’s (%d)!",BMI_L,BMI_P);
}else{
    console.log("Petter' BMI (%d) is higher than Lucas’s (%d)!",BMI_P,);
}
//D

function CovertCelsiusToFahrenheit(cel){
    var fahrenheit= ((cel* 1.8) + 32 ).toFixed(2);
    console.log(cel+"C is "+fahrenheit+"F");
}
function CovertFahrenheitToCelsius(fah){
  var  celsius= ((fah - 32) * 0.5556).toFixed(2);
  console.log(fah+"F is "+celsius+"C");
}
CovertCelsiusToFahrenheit(100);
CovertCelsiusToFahrenheit(0);
CovertCelsiusToFahrenheit(10);

CovertFahrenheitToCelsius(32);
CovertFahrenheitToCelsius(10);
CovertFahrenheitToCelsius(102);
