// JSON
// JavaScript Object Notation

// 1. Object to Json
// stringfy(obj)

const rabbit = {
    name: "tori",
    color: "white",
    size: null,
    birthDate: new Date(),
    // symbol: Symbol("id"), //javascript 자체 정의된건 출력x
    jump: () => {
        console.log(`${name} can jump!`); //함수는 출력x
    },
};

// json = JSON.stringify(["apple","banana"]);

// 내가 원하는 것만 가져오기
// json = JSON.stringify(rabbit,["name"]); //1
json = JSON.stringify(rabbit,(key, value) => {
    console.log(`key: ${key}, value: ${value}`);
    return key === "name" ? "ellie" : value;
}); //1

console.log(json);//


// 2. Json to Object
console.clear();
json = JSON.stringify(rabbit);
const obj = JSON.parse(json);
console.log(obj);
rabbit.jump();
