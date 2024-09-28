// Cart-Size and Color
const optionMenu_Size = document.querySelector(".cart-Size_options"),
selectBtn_Size = optionMenu_Size.querySelector(".cart-select_size__btn"),
options_Size = optionMenu_Size.querySelectorAll(".cart-item-size__option"),
sBtn_text_Size = optionMenu_Size.querySelector(".sBtn-select-size");

selectBtn_Size.addEventListener("click", ()=> optionMenu_Size.classList.toggle("active_Size"));

options_Size.forEach(option_Size => {
option_Size.addEventListener("click", ()=>{
let selectedOption_Size = option_Size.querySelector(".option-text_size").innerText;
sBtn_text_Size.innerText = selectedOption_Size;
optionMenu_Size.classList.remove("active_Size")
})
})

const optionMenu_Color = document.querySelector(".cart-Color_options"),
selectBtn_Color = optionMenu_Color.querySelector(".cart-select_color__btn"),
options_Color = optionMenu_Color.querySelectorAll(".cart-item-color__option"),
sBtn_text_Color = optionMenu_Color.querySelector(".sBtn-select-color");

selectBtn_Color.addEventListener("click", ()=> optionMenu_Color.classList.toggle("active_Color"));

options_Color.forEach(option_Color => {
option_Color.addEventListener("click", ()=>{
let selectedOption_Color = option_Color.querySelector(".option-text_color").innerText;
sBtn_text_Color.innerText = selectedOption_Color;
optionMenu_Color.classList.remove("active_Color")
})
})
// Cart-Quantily
let amountElement = document.getElementById('amount')
let amount = amountElement.value

let render = (amount) =>{
    amountElement.value = amount
}
// Handle Plus
let handlePlus = () =>{
    amount++
    render(amount);
}
// Handle Minus
let handleMinus = () =>{
    if(amount > 1)
        amount--;
    render(amount);
}

amountElement.addEventListener('input' , () =>{
    amount = amountElement.value;
    amount = parseInt(amount);
    amount = (isNaN(amount) || amount==0 )?1:amount;
    render(amount);

});

