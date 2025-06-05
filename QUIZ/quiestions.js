const weight = 75;
const height = 1.68;

//BMI = 体重[kg] / (身長[m] ** 2)

console.log(calculateBmi(weight,height));

function calculateBmi(w,h){

  const bmi = w / (h ** 2);

  return bmi;
}