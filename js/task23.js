let array_1 = ['Вселенная', 23.5,49,null,true];
let myCar = {};
myCar.name = "Opel";
myCar.model ="Corsa";
myCar.year = 2012;
myCar.color = "Gray Metallic";
console.log('Длина массива: '+array_1.length);
console.log('Длина обьекта: '+Object.keys(myCar).length);

function iteratingElements(arrayOrObject) {
    if (Array.isArray(arrayOrObject)) {
        arrayOrObject.splice(3, 1);
    }
    if ($.isPlainObject(arrayOrObject)) {
        delete arrayOrObject.year;
    }
    $.each(arrayOrObject, function (key, value) {
        console.log('Ключ: '+key+ ' Значение '+ value);
    });
}
iteratingElements((array_1));
iteratingElements((myCar));

console.log('Длина массива: '+array_1.length);
console.log('Длина обьекта: '+Object.keys(myCar).length);

let key = 'dynamic_key';
let val='value';
let myObject= {
    [key]: [val]
}

function addElementToObject (obj, key, val) {
    obj[key] = val;
}
 addElementToObject(myObject, 'test_key','test_value');
console.log(myObject['test_key']);